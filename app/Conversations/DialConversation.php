<?php

namespace App\Conversations;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class DialConversation extends Conversation
{
    /**
     * First question
     */

    public function askReason()
    {
        $this->ask('Bonjour, vous allez bien ?', [
        [
            'pattern' => 'yes|yep|oui|ca va|ça va',
            'callback' => function () {
                $this->say('Tout va pour le mieux alors !');
            }
        ],
        [
            'pattern' => 'nah|no|nope|non|pas',
            'callback' => function () {
                $this->askWhy();
            }
        ],
        ]);
    }

    public function askWhy(){
        $this->ask('Mince ! que se passe-t-il ? Attention à ne pas prendre la route si vous ne vous sentez pas bien !', [
            [
                'pattern' => 'malade',
                'callback' => function () {
                    $this->say('J\'espère que ça ira mieux pour vous, je reste à votre disposition si vous avez des questions !');
                }
            ],
            [
                'pattern' => 'sais',
                'callback' => function () {
                    $this->say('Faites attention à vous ...');
                }   
            ],
        ]);
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askReason();
    }
}
