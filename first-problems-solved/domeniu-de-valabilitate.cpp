// Written at: 5 nov 2017

#include <iostream>
#include <fstream>
using namespace std;
int nume=10;
int main()
{
	int nume=5; //variabila locala
	cout<<"Valoarea variabilei locale "<<nume<<endl; //endl e folosit pt trecerea la rand nou //=5
	cout<<"Valoarea variabilei globale "<<::nume<<'\n'; //=10

	int g;
 	cin >>g;
}
