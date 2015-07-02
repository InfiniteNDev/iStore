//Gruntfile
module.exports = function(grunt) {
  require('load-grunt-tasks')(grunt);
  //Initializing the configuration object
  grunt.initConfig({

      // Task configuration
      concat: {
        options: {
          separator: ';',
        },
        js_frontend: {
          src: [
          './bower_components/jquery/dist/jquery.js',
          './bower_components/bootstrap-sass/assets/javascripts/bootstrap.js',
          './bower_components/modernizr/modernizr.js',
          './resources/assets/javascripts/frontend.js'
          ],
          dest: './public/assets/javascripts/frontend.js',
        },
        js_backend: {
          src: [
          './bower_components/angular/angular.js',
          './resources/assets/javascript/backend.js'
          ],
          dest: './public/assets/javascripts/backend.js',
        },
      },
      sass: {
        dist: {
          files: [{
            "./public/assets/stylesheets/style.css": "./resources/assets/stylesheets/style.scss"
          }]
        }
      },
      uglify: {
        options: {
          mangle: true  // Use if you want the names of your functions and variables unchanged
        },
        frontend: {
          files: {
            './public/assets/javascripts/frontend.js': './public/assets/javascripts/frontend.js',
          }
        },
        backend: {
          files: {
            './public/assets/javascripts/backend.js': './public/assets/javascripts/backend.js',
          }
        }
      },
      phpunit: {
        classes: {
            dir: './app/tests/'   //location of the tests
        },
        options: {
            bin: 'vendor/bin/phpunit',
            colors: true
        }
      },
      watch: {
        js_frontend: {
          files: [
            //watched files
            './resources/assets/javascripts/frontend.js'
            ],   
          tasks: ['concat:js_frontend','uglify:frontend'],     //tasks to run
          options: {
            livereload: true                        //reloads the browser
          }
        },
        js_backend: {
          files: [
            //watched files
            './resources/assets/javascripts/backend.js'
          ],   
          tasks: ['concat:js_backend','uglify:backend'],     //tasks to run
          options: {
            livereload: true                        //reloads the browser
          }
        },
        sass: {
          files: [
            './resources/assets/stylesheets/*.scss',
            './bower_components/boostrap-sass/assets/stylesheets/*.scss',
            './bower_components/boostrap-sass/assets/stylesheets/bootstrap/*.scss'
          ],  //watched files
          tasks: ['sass'],                          //tasks to run
          options: {
            livereload: true                        //reloads the browser
          }
        },
        tests: {
          files: ['./app/controllers/*.php','./app/models/*.php'],  //the task will run only when you save files in this location
          tasks: ['phpunit']
        }
      }
    });

  // Plugin loading
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-phpunit');

  // Task definition
  grunt.registerTask('default', ['watch']);

};
