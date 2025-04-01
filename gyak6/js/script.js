import { userlist } from './db.js'

console.log('Hello JS!');

console.log(userlist[0].name);

//Primitive types
const active = true; //boolean
const age = 22; //number
const userName = 'Mz/x';
const nothing = null;
let price; //undefined

//collections
const items = [1, 5, ['hello', true], 'message']; //tömb

console.log(items[2][1]);
console.log(items.length);

const settings = {
    url: 'http://localhost:3000',
    devMode: true,
}; //objektum

console.log(settings.url);

const key = 'devMode';
console.log(settings[key]); //kiolvassuk a változóból, hogy devMode és visszaadjuk az értékét

console.log(age.toFixed(1)); //egész számot ad vissza, de a tizedes pont után 1 számjegyet is megjelenít

Number.prototype.hello = function() {
    console.log(this);
    console.log('This is the function from the hello method');
};
age.hello();

