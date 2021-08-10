// Written at: 8 apr 2018

#include <iostream>
#include <fstream>
#include <cstring>
#define FOR(i,a,b) for(int i=(a);i<=(b);i++)
using namespace std;
/*
Cerinta: sa se determine subtabloul care poate fi descoperit cu nr minim de plieri;

*/

ifstream f("input.in");

char s[255],nume;
int a[100][100],n,col,minim=-32000;

void citire() {
	int k=0,l=0,j=0;
	while(!f.eof()) {
		f.getline(s,255);
		for(int i=0;i<strlen(s);i++) {
			if(s[i]>='A' && s[i] <='Z') {
				a[k][l++] = s[i];
			}
		}
		k++;
		if(j==0) {
			col = l;
			j=1;
		}
		//resetam coloana la fiecare citire de linie
		l =0;
	}
	n = k;
//	cout << k << " " << col ;
}

//coloana = <col
//linie = <n-1

void dei(int li, int ls, int ci, int cs,int pliere) {
	int el=a[li][ci],k=0;
	if(li==ls && ci==cs) return;
	FOR(i,li,ls)
	FOR(j,ci,cs)
	if(a[i][j] == el) 
	k++;
	
	if(k==(ls-li+1)*(cs-ci+1) && minim < pliere) {
		minim = pliere;
		nume = (char)el;
	}
	else {
		int ml = (li+ls)/2;
		int mc = (ci+cs)/2;
		dei(li,ml,ci,mc,pliere+1);
		dei(li,ml,mc+1,cs,pliere+1);
		dei(ml+1,ls,ci,mc,pliere+1);
		dei(ml+1,ls,mc+1,cs,pliere+1);
	}
}

void afisare() {
	int i,j;
	for(i=0;i<n-1;i++) {
		for(j=0;j<col;j++)
			cout << (char)a[i][j] << " ";
		cout << '\n';
	}
}

int main() {
	citire();
	afisare();
	dei(0,n-2,0,n-2,0);
	cout << minim;
	if(nume=='R') cout << " " << "Rosu";
	else cout << " " << "Negru";
}

