define([], function () {
	return {
		get: function (key) {
			return localStorage.getItem(key);
		},
		set: function (key, value) {
			return localStorage.setItem(key, value);
        },
        remove: function (key) {
            return localStorage.removeItem(key);
		}
	};
});