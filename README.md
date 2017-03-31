# roksh-encryption-algorithm
Here's how it all started... This is a library to facilitate the smooth communication in times of war, between Roksh - the petite village of farmers, and Zrytk - the fairly large village of blacksmiths and hunters Roksh is under massive assault from the four neighbouring villages - Slyek, Doek, Maroek and Groech. Rokshites need to be able to securely pass messages to and from their Zrytk saviours without standing the risk of the assailants intercepting.


``` Algorithm developed by Devcrib Engineers ```

### project demo
See the demo here at [devcrib.github.io/roksh-encryption-algorithm](https://devcrib.github.io/roksh-encryption-algorithm)

***

##### Supervised by:
>   Banjo Mofesola Paul [@de-paule](https://github.com/De-paule) | 
    [facebook](https://facebook.com/mofesolab) |
    [twitter](https://twitter.com/mpdepaule)

##### Contributors:


## Usage
The library features two main methods: `encrypt()` and `decrypt()` which accept a single value passed by reference.

##### Example
```php
$str = "This is a library to facilitate the smooth communication in times of war";

encrypt($str);
// echo "Encrypted: $str";

decrypt($str);
// echo "Decrypted: $str";
```