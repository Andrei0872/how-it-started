// Written at: 28 nov 2017

/*
Se citesc doua date calendaristice precizate prin zi, luna si an. Afisati numarul de zile dintre cele doua date calendaristice citite.
*/ ///pb2
#include <iostream>
using namespace std;

struct data
{
    int zi,luna,an;
};

int nrzile(int luna, int an)
{
    int Z[13]={31,31,28,31,30,31,30,31,31,30,31,30,31};
    if(luna!=2 || !(an%4==0 && an%100!=0 || an%400==0)) return Z[luna];
    else return 29;
}

int nrzileazi(data d)
{///cate zile de la anul 0
    int z=(d.an-1)*365+(d.an-1)/4-(d.an-1)/100+(d.an-1)/400;
    for(int i=1;i<d.luna;i++)
        z=z+nrzile(i,d.an);
    return z+d.zi;
}

void citire(data &d)
{
    cin>>d.zi>>d.luna>>d.an;
}

int main()
{
    data d1,d2;
    citire(d1);
    citire(d2);
    if(nrzileazi(d1)>nrzileazi(d2))
        cout<<nrzileazi(d1)-nrzileazi(d2);
    else
        cout<<nrzileazi(d2)-nrzileazi(d1);
    return 0;
}
