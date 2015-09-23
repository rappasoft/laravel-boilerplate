<?php namespace App\Helpers\Installer;

/**
 * Class CheckRequirements
 * @package App\Helpers\Installer
 */
class CheckRequirements {

    /**
     * @param array $requirements
     * @return array
     */
    public function check(array $requirements)
    {
        $results = [];

        foreach($requirements as $requirement)
        {
            $results['requirements'][$requirement] = true;

            if(! extension_loaded($requirement))
            {
                $results['requirements'][$requirement] = false;
                $results['errors'] = true;
            }
        }

        return $results;
    }
}