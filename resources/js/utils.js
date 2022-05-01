
/* Look & Feel Util */
export const parseLnf = function (props) {
    const classes = [];
    Object.keys(props).forEach(function (key) {
        console.log(key)
        if (key.startsWith('l')) {
            const value = Object.getOwnPropertyDescriptor(props, key).value.toString();
            /* Suffixed */
            if(key.startsWith('ls')) {
                value.split(' ').forEach(function (item) {
                    classes.push(key.substring(2).toLowerCase() + ':' + item);
                });
            } else {
                classes.push(value)
            }
        }
    });
    return classes;
}
