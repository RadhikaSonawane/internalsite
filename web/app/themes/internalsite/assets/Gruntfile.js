module.exports = function (grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
	  // Tasks
	  sass: {
        options: {
            sourceMap: false
        },
        dist: {
            files: {
                'css/main.css': 'scss/main.scss'
            }
        }
	  },
	  watch: { // Compile everything into one task with Watch Plugin
		css: {
		  files: 'scss/*.scss',
		  tasks: ['sass', 'cssmin']
		},
	  },
	  cssmin: { // Begin CSS Minify Plugin
		target: {
		  files: [{
			expand: true,
			cwd: 'css',
			src: ['*.css', '!*.min.css'],
			dest: 'css',
			ext: '.min.css'
	  }]
		}
	  },

	});
	// Load Grunt plugins
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
  
	// Register Grunt tasks
	grunt.registerTask('default', ['watch', 'sass', 'cssmin']);
  };