// Written at: 7 oct 2017

#include <iostream>

using namespace std;

int main()
{

    int rezultat, nr,cifra;
    cin>>nr;
    rezultat = 0;     // initializam rezultatul cu 0
while ( nr != 0 )    //adica cat timp mai avem cifre
{
       cifra = nr % 10 ;      //luam ultima cifra, luand restul impartirii la 10
       nr = nr / 10 ;     // stergem ultima cifra din numar, impartind la 10
       if ( cifra != 0 )        // daca cifra nu e 0
       rezultat = (rezultat * 10 ) + cifra ;    /// cum ziceam mai sus.. adaugam cifra la sfarsitul rezultatului;
}

// acum, rezultat va contine numarul initial fara 0.
cout<<rezultat;
}
//afiseaza inversul nr obtinut fara 0
///daca se face inv rezultatului, se va ajuge la rezultatul corect.
