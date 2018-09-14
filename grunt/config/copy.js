module.exports = {
	artifact: {
		files: [
			{
				expand: true,
				cwd: ".",
				src: [
					// Files to copy.
					"assets/xml-news-sitemap.xsl",
					"assets/*.min.js",
					"classes/**",
					"languages/*.mo",
					"vendor/**",
					"license.txt",
					"*.php"
				],
				dest: "<%= files.artifact %>",
			},
		],
	},
};
