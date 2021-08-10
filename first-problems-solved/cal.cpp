// Written at: 28 aug 2018

/*
 un cal pe tabla de sah, acesta trebuie sa treaca prin toate casutele tablei, o singura data
 pb 82/133 Culegere IX-XI
*/


/*
Rationament {
	
	-avem intai 2 vectori de directii, cu ajutorul carora vom muta calul corespunzator
	-verificam ca nu cumva calul sa sara in afara tablei de sah
	-pe masura ce calul avanseaza, incrementam si k ul	
	-y:ordonate; x:abscisa
}
*/

//o buna sursa de inspiratie : https://www.geeksforgeeks.org/backtracking-set-1-the-knights-tour-problem/

#include <iostream>
using namespace std;

int a[10][10],//tabla de sah
	 n,//dimensiunea tablei de sah
 	 nr_sol; //nr de solutii gasite

	//vectorii de directii
	int dx[8] = {  2, 1, -1, -2, -2, -1,  1,  2 };
 	int dy[8] = {  1, 2,  2,  1, -1, -2, -2, -1 };

	 //verificam daca o pozitie se incadreaza pe tabla
	 int valid (int y, int x) {
	 //daca este in afara tablei sau pozitia este deja ocupata
	 	if(y<1 || y >n || x<1 || x>n || a[y][x] !=0) 
	 		return 0;
	 	return 1;
	 }
	 
	void tipar() {
		if(nr_sol < 2) {
			nr_sol++; //crestem nr de solutii
			cout << "solutia " << nr_sol << ":\n";
			for(int i=1;i<=n;i++) {
				for(int j=1;j<=n;j++) 
					cout << a[i][j] << " ";
					cout << "\n";
			}
		}
	}
	
	void bk(int k, int y, int x) {
		if(k == (n*n)) {
			//am parcurs toata tabla si avem o solutie
			tipar(); //afisam solutia 
//			cout << "da" << endl;
		}
		else {
			//ne folosim de vectorii de directie
			for(int i=0;i<8;i++) {
			
//				luam noile coordonate
				int xx = x+dx[i];
				int yy = y+dy[i];
				//verificam daca pozitiile sunt valide
				if(valid(yy,xx)) {
					a[yy][xx] = k; //marcam pozitia
//					trecem la urmatoarea pozitie
					bk(k+1,yy,xx);
					//reluam de la acea pozitie, poate se mai gaseste si alta solutie
					a[yy][xx] = 0;
				}
			}
		}
	} 
	  
	  
	int main () {
		cout << "n= ";
		cin >> n;
//		cout << valid(3,2);
		bk(1,1,1);
		return 0;
	} 
	  
	  
	  
