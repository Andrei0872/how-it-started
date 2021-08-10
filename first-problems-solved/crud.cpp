// Written at: 15 mai 2018

//creare CRUD folosind liste

#include <iostream>
#include <cstring>
using namespace std;

char * strlwr(char * str) {
  unsigned char * p = (unsigned char * ) str;
  cout << "p = " << p << endl;
  while ( * p) { * p = tolower((unsigned char) * p);
    p++;
  }
  return str;
}

struct nod {
	
	char nume[20]; //numele elevului
	nod *leg; //legatura
	
};

nod *prim,*ultim;

//creez primul nod
void creare(char s[]) {
	 prim = new nod;
	 strcpy(prim->nume,s); //se adauga informatia
	 prim->leg = NULL; //fiind primul element si SINGURUL, dupa acesta nu mai urmeaza nimic
	 ultim = prim;//fiind primul element, acesta este automat si ultimul
}

//adaugarea celorlalte noduri
void adaugare(char s[]) {
	
	nod *c = new nod;
	strcpy(c->nume,s); //adaugam informatia
	ultim->leg = c; //se face legatura dintre nodul precedent si cel nou creat
	ultim = c; //cand nodul nou se adauga, automat devine si ultimul
	ultim->leg = NULL;//fiind ultimul, acesta nu mai are nimic dupa el
	
}


void inserareElev(int nr_elevi) {

char nume_nou[255]; //numele elevului nou inserat
int poz; //pozitia pe care acesta se va regasi

		cout << "Numele elevului pe care doriti sa-l inserati : "; cin >> nume_nou;
		cout << "Pozitia unde doriti sa-l inserati : "; cin >> poz;
		if(poz > nr_elevi) {
			
					cout << "Pozitia incorecta!";
					return;
				
			}
			else {
				
				poz = poz-1;
				//creez un nou nod pe care il pun la inceput, in caz ca inserarea se va face pe prima pozitie
				nod *temp = new nod;
				temp->leg = prim;
				strcpy(temp->nume,"nu cont");
				prim = temp;
				
				
				//cout << poz << endl;
					int k = 0;
					int gasit = 0;
					nod * c =prim;
					while(c && !gasit ) { 	// !gasit este echivalent cu gasit == 0					
							if(k==poz) {
								//cout << c->nume << "\n"; 
									gasit = 1;
									nod *z = new nod;
									z->leg = c->leg; //facem legatura cu urm  nod dupa "c"
									strcpy(z->nume,nume_nou); //ii adaugam informatia
									c->leg = z; //facem legatura dinte nodul actual si cel nou inserat
								}
								k++;
								c = c->leg;
						}
				
				//stergem nodul de la inceput caci nu vrem sa fie afisat, doar l am folosit pt inserare
				
				nod *del = temp;
				temp  = temp->leg;
				prim = temp;
				delete del;
				
				}
	
}

void stergereElev(int nr_elevi) {
	char nume_del[20];
	cout << "Numele elevului pe care doriti sa il stergeti : "; cin >> nume_del;
	
	//adaug un nod la inceput in caz ca primul nod contine informatia care trebuie stearsa
	nod *z = new nod;
	z->leg = prim;
	strcpy(z->nume,"nu cont");
	prim = z;

	int gasit = 0;
	
	nod *c = prim;
	
	while(c->leg) {
		
		//cautam precedentul
		if(strcmp(strlwr(c->leg->nume),strlwr(nume_del)) == 0 ) {
			//s-a gasit precedentul
			gasit =1;
			nod *r = c->leg; //nodul ce va fi sters
			nod *q= r->leg; //nodul care urmeaza dupa nodul ce va fi sters
			c->leg = q;
			delete r;
			//nu mai e nevoie sa trecem la urm nod imediat dupa stergere
			}
		
		else c = c->leg; //daca nu s a sters, se parcurge lista
		
		}
		
		if(gasit == 0) cout << "Elevul cautat nu se afla in lista \n\n";
		else cout << "Stergere efectuata cu succes \n\n";
		
		//stergem primul nod
		nod * del = z;
		z = z->leg;
		prim = z;
		delete del;
	
	}

void afisareElevi() {
	
		nod *c = prim;
		for(;c;c=c->leg)
			cout << c->nume << " ";
			
		cout << "\n";
	
	}


int main () {

int nr_elevi;
char s[255]; //numele elevului

cout << "Numarul de elevi ai clasei : "; cin >> nr_elevi; cout << "\n";
	
cin >> 	s; 
creare(s); //creez primul nod cu primul nume citit

for(int i=2;i<=nr_elevi;i++)
	cin >> s, adaugare(s);
	
	afisareElevi(); //afisare inainte de afisare
	
	inserareElev(nr_elevi);
	
	afisareElevi(); //afisare dupa inserare 
	
	stergereElev(nr_elevi); //stergere elev
	
	afisareElevi(); //afisare dupa stergere
	
	return 0;
}
