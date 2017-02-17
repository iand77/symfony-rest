<?php
// src/APIBundle/Command/CreateUserCommand.php
namespace APIBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Helper\ProgressBar;

class GenerateApiCommand extends Command
{
    protected function configure()
    {
      $this
      // the name of the command (the part after "bin/console")
      ->setName('api:generate')

      // the short description shown while running "php bin/console list"
      ->setDescription('Generates REST API from Doctrine Entities.')

      // the full command description shown when running the command with
      // the "--help" option
      ->setHelp("Generates REST API from Doctrine Entities.");
    }

  // ...
  protected function execute(InputInterface $input, OutputInterface $output)
  {
      // outputs multiple lines to the console (adding "\n" at the end of each line)
      $output->writeln([
          'API Generator v1.0 (iand77)',
          '============================================================',
          '',
      ]);

      // Step 1: Scan entity directory

      // Step 2: Generate API REST Controllers per Entity updating routes in api-routing.yml

      // Step 3: Generate API Documentation

      // Step 4: Set up authentication mechanism

      $entities_dir = preg_replace('~/[^/]+/../~Usi', '/', __DIR__.'/../Entity/');

      $entities = scandir($entities_dir);

      foreach($entities as $k=>$entity) {

        if ( pathinfo($entity, PATHINFO_EXTENSION) === 'php' )
          $output->writeln($entities_dir.$entity);

      }


      // create a new progress bar (50 units)
      $progress = new ProgressBar($output, 50);

      // start and displays the progress bar
      $progress->start();

      $i = 0;
      while ($i++ < 50) {
          // ... do some work
          usleep(10000);
          // advance the progress bar 1 unit
          $progress->advance();

          // you can also advance the progress bar by more than 1 unit
          // $progress->advance(3);
      }

      // ensure that the progress bar is at 100%
      $progress->finish();
      $output->writeln(' Complete');
      $helper = $this->getHelper('question');
      $question = new ConfirmationQuestion('Continue with this action?', false);

      if (!$helper->ask($input, $output, $question)) {
        return;
      }

      // outputs a message followed by a "\n"
      $output->writeln('Whoa!'.__DIR__);

      // outputs a message without adding a "\n" at the end of the line
      $output->write('You are about to ');
      $output->write('create a user.');
  }
}
