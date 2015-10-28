<?php namespace App\Jobs;

/**
 * This is an example job created with the command `php artisan make:job ExampleJob --queued`
 * You may leave off the --queued flag for a synchronous job
 * You may be asking yourself, when is a good time to use an event/listener pattern over a job?
 *
 * Jeffrey Way says it best:
 * "An event is when you want to make an announcement to your application such as: 'Hey! this user registered!'"
 * Then you listen for that event and do something like fire off an email.
 * A job is more of a core component of your application, such as the CompileReport example in this Laracast:
 * https://laracasts.com/series/intermediate-laravel/episodes/11
 *
 * To call a job in your controllers, you may use:
 * $this->dispatch(new ExampleJob);
 * Reason being is because your base controller uses the DispatchesJobs trait, if you want to use the dispatch commands in any class, import and use the use Illuminate\Foundation\Bus\DispatchesJobs trait.
 * If you are on PHP >= 5.5 you may use $this->dispatch(ExampleJob::class); (After importing)
 *
 * Another cool feature is the dispatchFrom method, which takes in the class as well as a request, then automatically converts the request variables to the parameters for the constructor.
 *
 * Say you had a $request variable that was ['name' => 'Anthony', 'gender' => 'male']
 * And your Job constructor took two parameters, $name & $gender.
 * As long as they are the same name you can do:
 * $this->dispatchFrom(new ExampleJob, $request);
 * And they will be automatically injected, instead of passing them separately, which will then make them available in your handle method.
 *
 * It should also be known the Handle method in this class has automatic resolution, so you can pass in your dependencies and have them resolved out of the Ioc container.
 *
 * You can have an event call a job or you can have a job call some events, your workflow is entirely up to you.
 * I'm only writing this here because I was overwhelmed when I first started with trying to keep up with all of the 'appropriate' patterns and methodologies. You should try your best to follow these, but you don't have to code the exact same way as everyone else, that's no way to learn.
 *
 * Sorry this was long, but I hope it was informative. This was one of the hardest things to wrap my head around when I first started, and I hope it helps some of you.
 *
 * - Anthony Rappa
 */

use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class ExampleJob
 * @package App\Jobs
 */
class ExampleJob extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
    }
}
