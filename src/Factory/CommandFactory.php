<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Transaction\Factory;

use Ulrack\Transaction\Component\Command;
use Ulrack\Transaction\Common\CommandInterface;

class CommandFactory
{
    /**
     * Creates a CLI command request.
     *
     * @param array $arguments The arguments passed to the command line.
     *
     * @return CommandInterface
     */
    public static function create(array $arguments): CommandInterface
    {
        return new Command(
            ...static::prepareArguments(
                $arguments
            )
        );
    }
    
    /**
     * Prepare the CLI arguments.
     *
     * @return array
     */
    private static function prepareArguments(array $arguments): array
    {
        // Strip the script
        array_shift($arguments);

        $command = array_shift($arguments);
        $flags = [];
        $options = [];
        $parameters = [];
        while ($argument = array_shift($arguments)) {
            // First find out if there is a flag or parameter passed.
            if (substr($argument, 0, 1) === '-') {
                // The --parameter=value markdown is used
                if (strpos($argument, '=') > 0) {
                    $expArg = explode('=', $argument);
                    $parameters[ltrim($expArg[0], '-')] = $expArg[1];

                    continue;
                }

                // No subsequent value starting without a "-"
                // It must be a flag
                if (empty($arguments[0])
                || substr($arguments[0], 0, 1) === '-') {
                    $flags[] = ltrim($argument, '-');
                    
                    continue;
                }

                // There was a subsequent value starting without a "-"
                // It counts as a parameter
                $argument = ltrim($argument, '-');
                $parameters[$argument] = array_shift($arguments);

                continue;
            }

            // Additional arguments go into the options array
            $options[] = $argument;
        }

        return [$command, $parameters, $options, $flags];
    }
}
