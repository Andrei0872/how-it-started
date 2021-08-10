// Written at: 28 aug 2018

/*
sursa : https://www.geeksforgeeks.org/largest-rectangle-under-histogram/

cel mai mare dreptunghi dintr o histograma

rationament  : cautam inaltimea maxima, iar dupa ce am gasit o, daca urm elemente mai mici, va trebui sa modificam intalimea maxima avand in vedere care este inaltimea maxima actuala, pozitia unde s a gasit elementul mai mic decat maximul si indexul din varful cozii

pe masura ce se actualizeaza maximul,  adaugam in stack index ul elementului


Exemplu:
pt 6, 2, 5, 4, 5, 1, 6

Se va afisa : 12


*/

#include <iostream>
#include <stack> //pt indecsi
using namespace std;

int a[100],n;
stack<int> result;

//citirea vectorului
void citire() {

cout << "n= ";
cin >> n;
for(int i=0;i<n;i++)
	cin >> a[i];

}

//functia prin care aflam suprafata maxima
int getMax() {

int max_area = 0; //aria maxima, pe care o vom returna la final
int area = 0; //aria temporara
int i =0; //urmeaza sa parcurgem vectorul de inaltimi
int top_stack; //varful stack ului

while(i < n){ //parcurgem vectorul

//daca elementul curent este mai mare decat el din varful stack ului, atunci il adaugam in varf
//sau daca stack ul este gol

if(result.empty() || a[result.top()] <= a[i])
	result.push(i++); //adaugam in stack indexul si incrementam i ul

 else {
	//daca inaltimea este mai mica decat varful stack ului, va trebui sa adjustam si sa calculam aria 
	top_stack = a[result.top()]; //preluam valoarea din top ul stack ului
	result.pop(); //stergem index ul din varf, pt ca el nu va stoca index ul potrivit.
	//daca stack ul este deja gol, putem afla suprafata inmultind i ul cu ultima val din stack
	//daca stack ul nu este gol, inmultim valoarea din var din stack cu dif dintre i(unde suntem acum), index ul din varf (dupa stergere) si 1
	area = top_stack  * (result.empty() ? i : i-result.top() - 1);
	//determinam aria maxima
	if(max_area < area) {
		max_area = area;
	}
}
}

//golim stack ul si calculam suprafata maxima
while(!result.empty()) {

	//luam val de sus
	top_stack = a[result.top()];
	result.pop();
	area = top_stack  * (result.empty() ? i : i-result.top() - 1);
	if(max_area < area) {
		max_area = area;
	}
}


//la sf, returnam suprafata maxima
return max_area;
}


int main() {
citire();
cout << getMax() << "\n";
return 0;
}

