// Written at: 17 ian 2018
// This is a very special one.

#include <iostream>
#include <string.h>
#include <fstream>
using namespace std;
ifstream f("date.in");
ofstream g("date.out");
struct muncitor{
char nume[20], prenume[20];
unsigned int timpOre;
float SalOrar, Salariu;
};
struct fabrica {
muncitor mun[100];
int m,suma=0;//suma pe sectii
}a[100]; //pt nr de sectii
int n, sumaFabrica=0;
void citire()
{
    f>>n;
    for(int i=0;i<n;i++)
    {
       f>>a[i].m; //nr de muncitori din sectia i;
        for(int j=0;j<a[i].m;j++) // j mai mic decat nr de muncitori din sectia i
        {
          f.get();
           f.getline(a[i].mun[j].nume,20);
           f.getline(a[i].mun[j].prenume,20);
            f>>a[i].mun[j].SalOrar;
         f>>a[i].mun[j].timpOre;
            a[i].mun[j].Salariu=a[i].mun[j].SalOrar*a[i].mun[j].timpOre;
            a[i].suma +=a[i].mun[j].Salariu;
        }
        sumaFabrica += a[i].suma;
    }
}

void afisare()
{
    for(int i=0;i<n;i++)
    {
        g<<"salariul total din sectia "<<i+1<<" este "<<a[i].suma<<endl;
    }
   g<<"salariul total al fabricii : "<<sumaFabrica;

}
int main()
{
citire();
afisare();
f.close();
g.close();
return 0;
}
