<?php

namespace App\Console\Commands;

use App\Domains\Auth\Models\RecoveryCode;
use Illuminate\Console\Command;

class CleanupRecoveryCodes extends Command
{
    protected $signature = 'auth:cleanup-recovery-codes {--days=90}';
    protected $description = 'Clean up old used recovery codes';

    public function handle()
    {
        $days = $this->option('days');

        $deleted = RecoveryCode::used()
            ->where('used_at', '<', now()->subDays($days))
            ->delete();

        $this->info("Cleaned up {$deleted} old recovery codes.");
    }
}
