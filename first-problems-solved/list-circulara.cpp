// Written at: 28 aug 2018

/*
crearea unei liste circulare si afisarea acesteia in ordinea inversa citirii, folosind o functie recursiva
pg 29/131, M.Pasoi cls XI
lista circulara - adresa ultimului nod este primul nod
*/

#include <iostream>
#include <vector>
using namespace std;

struct nod {
	int inf;
	nod * leg;
};

nod *p, *u;

void creare (int x) {
	nod *c =  new nod;
	c->inf = x;
	
	//verific daca lista a fost sau nu creata
	if(!p) {
		
		//daca lista nu a fost creata inca
		p = new nod;
		p->inf = x;
		p->leg = p; //fiind singurul element si fiind vorba despre o lista circulara, adreasa primului nod este chiar primul nod
		u = p; // fiind primul nod, este de asemenea si singurul
	}else {
		//daca lista a fost creata
		u->leg = c; //facem legatura dintre ultimul nod si nodul nou inserat
		c->leg = p; // nodul c devine ultimul, deci adresa acestuia este chiar primul nodul
		u  = c; // ultimul nod devine c
	}
		
}

void afisareNerecursiva () {

	nod *a = p;
	
	do {
		cout << a->inf << " ";
		a = a->leg;
	}while(a!=p);
	
}

void afisareRec (nod*a, nod *p) {
	if(a->leg != p) afisareRec(a->leg,p);
	cout << a->inf << " ";
}

int main () {

//se spune din cerinta ca citirea are loc pana cand elementul citit acum este egal cu celor 2 precedente

int x,prev1,prev2,s;

vector<int>v;

cin >> x;
creare(x);
v.push_back(x);

cin >> x;
creare(x);
v.push_back(x);

//cout << v.size();
//cout << endl;
//cout << v[v.size()-1];
//cout << " " << v[v.size()-2];

cin>>x;
for(s = v[v.size()-1]+v[v.size()-2]; s != x;) {
//cout << endl;
//cout << "v[v.size()-1] : " << v[v.size()-1];
//cout << " "  << "v[v.size()-2] : "<< v[v.size()-2] << " ";
//	cout << "suma : " <<  s << endl;
	creare(x);
	v.push_back(x);
	cin >> x;
	s = v[v.size()-1]+v[v.size()-2];
	
}

//inserez in lista si ultimul nod
creare(x);

cout << "\n afisare nerecursiva in ordinea citirii : ";
afisareNerecursiva();

nod *c = p;

cout << "\n afisare recursiva in ordinea inversa citirii : ";
afisareRec(c,p);

//o mica verificare 
//cout << (prev ? "da":"nu") << endl;

return 0;

}
