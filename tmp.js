import { decrypt, encrypt } from "./roksh.crypto.es6.js";

let str = 'Hello World!';

for (let i = 0; i < 5; i++) {
    str = encrypt(str);
    console.log("Encrypted: " + str);
    str = decrypt(str);
    console.log("Decrypted: " + str + "\n");
}
