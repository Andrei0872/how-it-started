// Written at: 31 mar 2018

#include <iostream>
#include <cstring>
using namespace std;

//vedem daca un elev se afla catalog, folosind cautarea binara

struct elev {
    char nume[20],prenume[20];
    float medie;
}a[100];

int n;

void citire() {
    cin >> n;
    for(int i=0;i<n;i++)
        cin >> a[i].nume >> a[i].prenume >> a[i].medie;
}

void afisare() {
    for(int i=0;i<n;i++ )
        cout << a[i].nume << a[i].prenume << a[i].medie<<'\n';
}

void ordonare() {
 int i,j;
 elev temp;
 for(i=0;i<n-1;i++) {
    for(j=i+1;j<n;j++) {
        if(strcmp(a[i].nume,a[j].nume)>0 || strcmp(a[i].nume,a[j].nume)==0 && strcmp(a[i].prenume,a[j].prenume)>0) {
            temp = a[i];
            a[i] = a[j];
            a[j] = temp;
        }
    }
 }
}

float cautare(elev a[],int st, int dr,char nume_c[],char prenume_c[]) {
    if(st>dr) return -1;
    int m;
    m = (st+dr)/2;
    if(strcmp(a[m].nume,nume_c)==0 && strcmp(a[m].prenume, prenume_c)==0)
        return a[m].medie;
     if(strcmp(a[m].nume,nume_c)>0 || strcmp(a[m].nume,nume_c)==0 && strcmp(a[m].prenume,prenume_c)>0)
        return cautare(a,st,m-1,nume_c,prenume_c); //caut in stanga
     return cautare(a,m+1,dr,nume_c,prenume_c);

}

void rez() {
 cout << "\n Numele si prenumele elevului cautat: \n";
char nume_c[20],prenume_c[20];
cin >> nume_c >> prenume_c;
//cout << nume_c << " " <<prenume_c;
if(cautare(a,0,n-1,nume_c,prenume_c)==-1)
    cout << "Elevul cautat n a fost gasit";
else cout << cautare(a,0,n-1,nume_c,prenume_c);
}

int main()
{
    citire();
    ordonare();

   // afisare();
    cout << '\n';
    rez();
//    afisare();
return 0;
}

///cautare binara intr un vector de numere
/*
 #include <iostream>
 using namespace std;
 int a[100];
 int cautB(int st, int dr, int x) {
 int m;
 if(st>dr) return -1;
 m = (st+dr)/2;
 if(a[m]==x)
    return m;
 if(a[m]>x)
    return cautB(st,m-1,x);
 return cautB(st,m+1,x);
 }
 int main() {
 int x,n;
 cin >> n;
 for(int i=0;i<n;i++)
    cin >> a[i];
 cin >> x;
 cout << cautB(0,n-1,x);
 return 0;
 }

*/


