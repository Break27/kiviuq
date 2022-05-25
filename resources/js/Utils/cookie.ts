
export function getCookies() {
    return document.cookie.split(';');
}

export function getCookie(name) {
    name += '=';
    const arr = getCookies();
    for(const i in arr) {
        const cookie = arr[i].trim();
        if(cookie.indexOf(name) === 0)
            return cookie.substring(name.length, cookie.length);
    }
    return null;
}
