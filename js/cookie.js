function createCookie(name, value, days) {
    const expire = new Date(Date.now() + days * 24 * 60 * 60 * 1000);
    document.cookie = `${name}=${encodeURIComponent(value)}; expires=${expire.toUTCString()}`;
}

function deleteCookie(name) {
    const expire = new Date();
    expire.setTime(expire.getTime() - 24 * 60 * 60 * 1000);
    document.cookie = name + '=; expires=' + expire.toGMTString();
}

function getCookie(name) {
    return document.cookie.replace(new RegExp(`(?:(?:^|.*;\\s*)${name}\\s*\\=\\s*([^;]*).*$)|^.*$`), '$1');
}

function getAllCookies() {
    const list_cookies = document.cookie.split(';');
    let list_cookies_detail = [];
    list_cookies.forEach(cookie => {
        list_cookies_detail.push(cookie.split('='));
    })
    return list_cookies_detail;
}

function deleteAllCookies() {
    const expire = new Date();
    expire.setTime(expire.getTime() - 24 * 60 * 60 * 1000);
    $(getAllCookies()).each(function (cookie) {
        document.cookie = cookie[0] + '=; expires=' + expire.toGMTString();
    })
}