module.exports = {
	artifact: {
		options: {
			archive: "artifact.zip",
			level: 9,
		},
		files: [
			{
				cwd: "<%= files.artifact %>/",
				src: ["**"],
				dest: "wpseo-news",
			},
		],
	},
};
