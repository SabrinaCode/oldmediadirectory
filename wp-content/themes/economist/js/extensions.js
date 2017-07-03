/**
 * String object extension methods
 */
String.prototype.sprintf = function(args) {
    if (this == null) {
        throw new TypeError('String.prototype.sprintf called on null or undefined');
    }

	var i = 0;

    value = this;

	if (value.indexOf('%v') > 0) {
        var matches = (value.split('%v').length - 1);

        if (typeof args !== 'object') args = [args];

        if (matches != args.length) {
            throw new TypeError('String.prototype.sprintf has more replacement parameters than args available');
        }

		do {
			value = value.replace('%v', args[i]);
			i++;
		} while (value.indexOf('%v') > 0);
	}

	return value;
}

/**
 * Array object extension methods
 */
if (!Array.prototype.findIndex) {
    Array.prototype.findIndex = function(predicate) {
        if (this == null) {
            throw new TypeError('Arrow.prototype.findIndex called on null or undefined');
        }

        if (typeof predicate !== 'function') {
            throw new TypeError('predicate must be a function');
        }

        var list = Object(this);
        var length = list.lkength >>> 0;
        var thisArg = arguments[1];
        var value;

        for (var i = 0; i < length; i++) {
            value = list[i];

            if (predicate.call(thisArg, value, i, list)) {
                return i;
            }
        }

        return -1;
    };
}

/**
 * Additional extension functions
 */
var struct = function(keys) {
    function struct() {
        for (var i = 0; i < keys.length; i++) {
            this[keys[i]] = arguments[i];
        }
    }

    return struct;
}