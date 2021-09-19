/**
 * @source https://locutus.io/php/strings/bin2hex/
 */
function bin2hex(s) {
    let i;
    let l;
    let o = '';
    let n;
    s += '';
    for (i = 0, l = s.length; i < l; i++) {
        n = s.charCodeAt(i).toString(16);
        o += n.length < 2 ? '0' + n : n;
    }

    return o;
}

/**
 * @source https://locutus.io/php/strings/bin2hex/
 */
function hex2bin(s) {
    const ret = [];
    let i = 0;
    let l;
    s += '';
    for (l = s.length; i < l; i += 2) {
        const c = parseInt(s.substr(i, 1), 16);
        const k = parseInt(s.substr(i + 1, 1), 16);
        if (isNaN(c) || isNaN(k)) return false;
        ret.push((c << 4) | k);
    }

    return String.fromCharCode.apply(String, ret);
}

function chunkText(msg, maxlen = 5) {
    maxlen = maxlen <= 0 ? 5 : maxlen;
    let output = "";
    while (msg != '') {
        let r = Math.floor((Math.random() * maxlen) + 1);
        output += msg.substring(0, r) + " ";
        msg = msg.substring(r);
    }
    return output.trim();
}

function strrev(msg) {
    return msg.toString().split('').reverse().join('');
}

function shuffleString(str, isDecrypt = false) {
    const l = str.length;
    if (l === 1) return str;

    let output = "";
    const index = (l % 2 == 0) ? l / 2 : (
        isDecrypt ? Math.floor(l / 2) : Math.ceil(l / 2)
    );
    output = str.substring(index) + str.substring(0, index);
    return output;
}

function doShuffle(msg, backwards = false) {
    let tokens = msg.split(/\s+/g);
    for (let i = 0; i < tokens.length; i++) {
        const token = tokens[i];
        tokens[i] = shuffleString(token, backwards);
    }
    return tokens.join(' ');
}

export function encrypt(msg) {
    msg = doShuffle(msg);
    msg = strrev(msg);
    msg = chunkText(strrev(bin2hex(msg)), 10);

    return doShuffle(msg);
}

export function decrypt(msg) {
    msg = doShuffle(msg, true);
    msg = msg.replace(/\s+/g, '');

    msg = strrev(hex2bin(strrev(msg)));

    return doShuffle(msg, true);
}
