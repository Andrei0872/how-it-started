// Written at: 19 oct 2018

/*
Profesoara de geografie doreşte să distribuie teme de referat elevilor săi din clasa a XI-B. Dansa a pregatit k teme celor n elevi, unde n>=k si trebuie ca fiecare tema sa fie luata cel putin odata, indiferent daca 2 sau mai multi elevi vor lua aceasi tema. N si k se citesc de la tast, iar rezultatele sa fie scrise in fisierul geo.out
n=3, k=2;
geo.out:
1 1 2
1 2 1
1 2 2
2 1 1
2 1 2
2 2 1
Sunt 6 solutiiiiii!!!
*/
#include <iostream>
using namespace std;
int x[100000], n, k, ok, p, vdf[100];

int frecv(){//VectorDeFrecventa
int i;
    for(i=1; i<=p; i++) {vdf[i]=0;}
    for(i=1; i<=n; i++){
        vdf[x[i]]++;
    }
    for(i=1; i<=p; i++) if(vdf[i]==0) return 0;
    return 1;
}

void afis(){int i;
    for(i=1; i<=n; i++) {cout<<x[i]<<"\t";}
    cout<<endl;
}

int valid(int k){ int i; return 1;}

void back(int k){ int i;
    if(k==n+1){ if(frecv()) afis();}
    else {for(i=1; i<=p; i++){ x[k]=i; if(valid(k)) back(k+1);} }
}

int main(){cout << "Introdu numrele: "; cin>>n>>p; back(1);}