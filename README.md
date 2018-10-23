# Liip's Moodle custom branch
This branch includes some fixes made by Liip, as well as some adaptations needed for our Moodle SaaS.
It also includes [Drifter](https://github.com/liip/drifter) for development needs.

## Moodle development
To use this branch for development, follow the next steps:

    # Initiate the git submodules
    git submodule update --init

    # Create a symlink of the config file to the root of the repository
    ln -s virtualization/config.php ./

    # Create a config-dev file to store your develpment configuration
    touch config-dev.php

    # Create the vagrant box
    vagrant up --provision

### Test data
During provisionning, the Moodle _test site_ generator generates some courses, course content and users.
Usernames of the generated users are `tool_generator_xxxxxx` with `xxxxxx` from `000001` to `000100`
Password is `useruser`

## Theme development
If you use a theme generated from the [Liip Moodle theme template](https://github.com/liip-elearning/moodle-theme-template) follow the next steps:

You will first need to configure moodle to get the css you will work on, allowing BrowserSync to auto-reload the css.
Add the following line to your `config-dev.php`:

    $CFG->additionalhtmlhead = '<link rel="stylesheet" type="text/css" href="../theme/foobar/build/stylesheets/compiled.css">';

Then follow the next steps:

    # Connect to the vagrant box
    vagrant ssh

    # Go to your theme directory
    cd theme/foobar

    # Install frontend tools
    npm install

    # Run gulp
    gulp

You can now access your moodle page through port 3000 and get autoreloads on css changes

