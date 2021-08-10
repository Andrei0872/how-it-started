// Written at: 16 dec 2017

#include<iostream>
using namespace std;

void ordonare(int fr[], int x)
{
    int final=1;
    for(int i=0;i<x-1;i++)
    {
        if(fr[i]>fr[i+1])
        {
            int aux=fr[i];
            fr[i]=fr[i+1];
            fr[i+1]=aux;
            final=0;
        }
        if(!final) ordonare(fr,x-1);
    }
}

int main()
{
    int fr[10000]={0},i,x,a[20];
    /*fr este un vector caracteristic in care
    se memoreaza frecventa de aparitie a fiecarui
    numar citit*/
    cout<<"x=";cin>>x;
   for(i=0;i<x;i++)
   {
       cin>>a[i];
       fr[a[i]]++;
   }
   //ordonare(fr,x); // afisarea in ordinea frecventei fiecarui numar
    /*se parcurge vectorul caracteristic
    si se afiseaza elementele care au fost
    citite cel putin odata precum si frecventa
    acestora*/
    for(i=0;i<x;i++)
       {

        if(fr[a[i]]!=0 )
            {cout<<a[i]<<" "<<fr[a[i]]<<endl;
               fr[a[i]]=0;}

}
}

/*
Se citesc de la tastatură 'n' numere naturale întregi, formate din cel mult patru cifre.
Să se afişeze numerele
citite în ordine crescătoare şi numărul de apariţii al acestora.
*/
