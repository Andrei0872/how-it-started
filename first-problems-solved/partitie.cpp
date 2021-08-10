// Written at: 28 aug 2018

/*
Generarea partitiilor unei multimi de n elemente
pb 5/11 M.Pasoi cls XI
---------------------------

Rationament: partitie - descomp a multimii initiale intr o reuniune de multimi disjuncte
-fiecare submultime va avea un nr de ordine, retinut de vectorul sol[]
!!!! - sol[k] = i === elementul a[k] afla in submultimea cu nr de ordin i

-------------------------------
avem : 
-vectorul a de lungime cu n elemente
-sol[] -  ce va retine nr de ordine ale submultimilotr
-variabila nr care retine nr de submultimi existente

*/

#include <iostream>
using namespace std;

int a[20], //vectorul care va retine elementele
	n, //nr de elemente
	sol[20]; //vectorul ce retine nr de ordine ale submultimilor
	//nr- nr de submultimi
void citire() {
	cout <<"n= "; cin>>n;
	//citim cele n elemente
	for(int i=0;i<n;i++)
		cin >> a[i];
}

void tipar(int nr){
	//vad initial despre cate submultimi este vorba
	//deci, parcurgem de la i la nr
	for(int i=1;i<=nr;i++) {
		//deschidem intai paranteza
			cout << "{";
		//parcurgem vectorul de valori ca se vedem din care multime face parte un element si apoi sa l afisam
		for(int j=0;j<n;j++) {
			//afisam elementele din multimea coresp
			
			//intai verificam din ce submultime face parte un element
			if(sol[j+1] == i) cout << " " <<  a[j] << " ";
		}
		//inchidem paranteza
		cout << "}";
	}
	cout << "\n";
}

//nr -  nr de submultimi
//k - cate elemente are o afisare
void back(int k, int nr){
	
	if(k == n+1) tipar(nr);
	else {
		//vedem cate submultimi sunt, initial va fi o singura submultime
		for(int i=1;i<=nr;i++) {
			sol[k] = i; //k - indexul lui a 
			//afisam tot ce se poate din acea submultime
			//crestem doar k -u, nr ramane la fel 
			back(k+1,nr);
		}
		//pt a stabili nr de submultimi
		
		/*
			initial k va fi 1; acesta va primi nr submult. 1;
			la apel, k va fi 2, si nr va fi 1, caci initial este 0
			dupa prima afisare ({a1,a2,a3...,an})
			acest apel a ramas back(2,1) -> mai este pana la N!!
			s[2] = 2; ->aici avem 2 multimi
			apelam -> back(3,2) -  ul apel
			in acest apel, for ul merge pana la 3 
			si se continua cu afisarea..
		*/
		sol[k] = nr+1; //creste nr submultimi avand in vedere si la ce K ne aflam
		back(k+1,nr+1);
	}
}
int main(){
citire();
back(1,0);
return 0;
}






