<?php

namespace Irazasyed\Telegram\Commands;

/**
 * Class HelpCommand
 *
 * @package Irazasyed\Telegram\Commands
 */
class HelpCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "help";

    /**
     * @var string Command Description
     */
    protected $description = "Help command, Get a list of commands";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        $commands = $this->telegram->getCommands();

        $response = '';
        foreach ($commands as $name => $handler) {
            $response .= sprintf('/%s - %s'.PHP_EOL, $name, $handler->getDescription());
        }

        $this->replyWithMessage($response);
    }
}
