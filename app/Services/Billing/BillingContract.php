<?php namespace App\Services\Billing;

/**
 * Interface BillingContract
 * @package App\Services\Billing
 */
interface BillingContract {

	/**
	 * @param $input
	 * @return mixed
	 */
	public function createCustomer($input);

	/**
	 * @param $id
	 * @param $input
	 * @return mixed
	 */
	public function updateCustomer($id, $input);

	/**
	 * @param $id
	 * @return mixed
	 */
	public function deleteCustomer($id);

	/**
	 * @param $customer_id
	 * @param $token
	 * @return mixed
	 */
	public function createCard($customer_id, $token);

	/**
	 * @param $customer_id
	 * @param $card_id
	 * @return mixed
	 */
	public function deleteCard($customer_id, $card_id);

	/**
	 * @param $customer_id
	 * @param $amount
	 * @return mixed
	 */
	public function getCharges($customer_id, $amount);

	/**
	 * @param $input
	 * @return mixed
	 */
	public function createPlan($input);

	/**
	 * @param $id
	 * @param $input
	 * @return mixed
	 */
	public function updatePlan($id, $input);

	/**
	 * @param $id
	 * @return mixed
	 */
	public function deletePlan($id);

	/**
	 * @param $customer_id
	 * @param $input
	 * @return mixed
	 */
	public function createSubscription($customer_id, $input);

	/**
	 * @param $customer_id
	 * @param $subscription_id
	 * @param $input
	 * @return mixed
	 */
	public function updateSubscription($customer_id, $subscription_id, $input);

	/**
	 * @param $customer_id
	 * @param $subscription_id
	 * @return mixed
	 */
	public function cancelSubscription($customer_id, $subscription_id);

	/**
	 * @param $input
	 * @return mixed
	 */
	public function createCoupon($input);

	/**
	 * @param $coupon_id
	 * @return mixed
	 */
	public function deleteCoupon($coupon_id);

	/**
	 * @param $charge_id
	 * @return mixed
	 */
	public function refund($charge_id);

	/**
	 * @param $input
	 * @return mixed
	 */
	public function charge($input);
}