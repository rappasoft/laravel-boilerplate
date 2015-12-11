<?php

namespace App\Services\Billing;

use Stripe;
use Stripe_Plan;
use Stripe_Charge;
use Stripe_Coupon;
use Stripe_Customer;

/**
 * Class StripeGateway
 * @package App\Services\Billing
 */
class StripeGateway implements BillingContract
{
    /**
     * Full Stripe Documentation
     * https://stripe.com/docs/api#intro
     *
     * These are just simple wrapper functions for their API
     * Front end processing is up to you
     */
    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }

    /**
     * @param  $input
     * @return Stripe_Customer
     */
    public function createCustomer($input)
    {
        return Stripe_Customer::create(array(
            'description' => $input['name'],
            'email'       => $input['email'],
        ));
    }

    /**
     * @param  $id
     * @param  $input
     * @return Stripe_Customer
     */
    public function updateCustomer($id, $input)
    {
        $cu              = Stripe_Customer::retrieve($id);
        $cu->description = $input['name'];
        $cu->email       = $input['email'];
        return $cu->save();
    }

    /**
     * @param  $id
     * @return Stripe_Customer
     */
    public function deleteCustomer($id)
    {
        $cu = Stripe_Customer::retrieve($id);
        return $cu->delete();
    }

    /**
     * @param  $customer_id
     * @param  $token
     * @return mixed
     */
    public function createCard($customer_id, $token)
    {
        $cu   = Stripe_Customer::retrieve($customer_id);
        $card = $cu->cards->create(['card' => $token]);
        return $card;
    }

    /**
     * @param  $customer_id
     * @param  $card_id
     * @return mixed
     */
    public function deleteCard($customer_id, $card_id)
    {
        $cu = Stripe_Customer::retrieve($customer_id);
        return $cu->cards->retrieve($card_id)->delete();
    }

    /**
     * @param  $customer_id
     * @param  $amount
     * @return array
     */
    public function getCharges($customer_id, $amount)
    {
        return Stripe_Charge::all([
            'customer' => $customer_id,
            'limit'    => $amount,
        ]);
    }

    /**
     * @param  $input
     * @return Stripe_Plan
     */
    public function createPlan($input)
    {
        return Stripe_Plan::create([
            'id'                   => $input['id'],
            'name'                 => $input['name'],
            'amount'               => $input['amount'],
            'currency'             => $input['currency'],
            'interval'             => $input['interval'],
            'interval_count'       => $input['interval_count'],
            'trial_period_days'    => $input['trial_period_days'],
            'statement_descriptor' => $input['statement_descriptor'],
        ]);
    }

    /**
     * @param  $id
     * @param  $input
     * @return Stripe_Plan
     */
    public function updatePlan($id, $input)
    {
        $plan                       = Stripe_Plan::retrieve($id);
        $plan->name                 = $input['name'];
        $plan->statement_descriptor = $input['statement_descriptor'];
        return $plan->save();
    }

    /**
     * @param  $id
     * @return Stripe_Plan
     */
    public function deletePlan($id)
    {
        $plan = Stripe_Plan::retrieve($id);
        return $plan->delete();
    }

    /**
     * @param  $customer_id
     * @param  $input
     * @return mixed
     */
    public function createSubscription($customer_id, $input)
    {
        $cu = Stripe_Customer::retrieve($customer_id);
        return $cu->subscriptions->create([
            'plan'      => $input['plan'],
            'card'      => $input['card'],
            'coupon'    => $input['coupon'],
            'trial_end' => $input['trial_end'],
            'quantity'  => $input['quantity'],
        ]);
    }

    /**
     * @param  $customer_id
     * @param  $subscription_id
     * @param  $input
     * @return mixed
     */
    public function updateSubscription($customer_id, $subscription_id, $input)
    {
        $cu        = Stripe_Customer::retrieve($customer_id);
        $sub       = $cu->subscriptions->retrieve($subscription_id);
        $sub->plan = $input['plan'];
        $sub->card = $input['card'];

        //Only update the coupon if there's something there
        if (!is_null($input['coupon'])) {
            $sub->coupon = $input['coupon'];
        }

        //Most likely being set to "now"
        if (isset($input['trial_end'])) {
            $sub->trial_end = $input['trial_end'];
        }

        $sub->quantity = $input['quantity'];
        return $sub->save();
    }

    /**
     * @param  $customer_id
     * @param  $subscription_id
     * @return mixed
     */
    public function cancelSubscription($customer_id, $subscription_id)
    {
        $cu = Stripe_Customer::retrieve($customer_id);
        return $cu->subscriptions->retrieve($subscription_id)->cancel();
    }

    /**
     * @param  $input
     * @return Stripe_Coupon
     */
    public function createCoupon($input)
    {
        return Stripe_Coupon::create($input);
    }

    /**
     * @param  $coupon_id
     * @return Stripe_Coupon
     */
    public function deleteCoupon($coupon_id)
    {
        $cpn = Stripe_Coupon::retrieve($coupon_id);
        return $cpn->delete();
    }

    /**
     * @param  $charge_id
     * @return mixed
     */
    public function refund($charge_id)
    {
        $ch = Stripe_Charge::retrieve($charge_id);
        return $ch->refund();
    }

    /**
     * @param  $input
     * @return Stripe_Charge
     */
    public function charge($input)
    {
        return Stripe_Charge::create($input);
    }
}
