// Written at: 21 nov 2017

#include <iostream>

using namespace std;

int main()
{
   int matrice[20][20],n,m; //Ne-am declarat o mattrice de 20 lini si 20 de coloane si n-numarul de linii si m -numaru de coloane
   int l1; //Mi-am declarat o variabila l1 care reprezinta prima linie de schimbat
   int l2; //Mi-am declarat o variabila l2 care reprezinta a doua linie de schimbat
    //Mi-am declarat o variabila linie cu care voi parcurge liniile
   cout<<"Dati numarul de linii: ";cin>>n; //Citesc numarul de linii
   cout<<"Dati numarul de coloane: ";cin>>m; //Citesc numarul de coloane
   for(int i=1;i<=n;i++)
    for(int j=1;j<=m;j++)
        cin>>matrice[i][j]; //Prin cele 2 foruri am parcurs linnile si coloanele pentru a putea afisa elementele din matrice

        cout<<"Dati prima linie: ";cin>>l1; //Citesc prima linie
        cout<<"Dati a doua linie: ";cin>>l2; //Citesc a doua linie


    for(int j=1;j<=m;j++){ //Parcurgem coloanele
            int aux=matrice[l1][j];
            matrice[l1][j]=matrice[l2][j];
            matrice[l2][j]=aux;//Am interschimbat cele 2 linii
    }
         for(int i=1;i<=n;i++){
        for(int j=1;j<=m;j++)
            cout<<matrice[i][j]<<" ";
            cout<<endl;
         } //Afisez noua matrice
        return 0;
}

