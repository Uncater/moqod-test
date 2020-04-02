<?php

namespace App\Console\Commands;

use App\Contracts\Brawlable;
use App\Exceptions\BadTeamDrainInputException;
use App\Exceptions\UnequalTeamsException;
use App\Factories\TeamFactory;
use Exception;
use Illuminate\Console\Command;

class TeamsBrawlCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'teams:brawl';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Makes a brawl between two commands and determines a winner';

    /**
     * Execute the console command.
     */
    public function handle(Brawlable $brawlable)
    {
        try {
            $teamA = TeamFactory::fromString($this->ask('Enter A team players:'));
            $teamB = TeamFactory::fromString($this->ask('Enter B team players:'));
            $winner = $brawlable
                ->brawl($teamA, $teamB)
                ->getWinner();
            $this->info($winner === $teamA ? 'Win' : 'Lose');
        } catch (Exception $exception) {
            if ($this->isInputException($exception)) {
                $this->error($exception->getMessage());
            } else {
                throw $exception;
            }
        }
    }

    protected function isInputException(Exception $exception)
    {
        $inputExceptions = [
            UnequalTeamsException::class,
            BadTeamDrainInputException::class,
        ];
        return in_array(get_class($exception), $inputExceptions);
    }
}
