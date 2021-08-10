// Written at: 14 sept 2018

/*
Persoana Personala
	
4:09 PM (4 minutes ago)
	
to me
   
Translate message
Turn off for: Romanian

Primarul cu stampila

Pentru ca in satul lui nimeni nu avea o adresa de corespondenta postala, primarul a hotarat ca fiecare din portile celor n (3<=n <= 100) case din sat, sa le marcheze cu o stampila ștanțata cu câte un numar x (99<=x<=99999), prin aplicarea unor stampile cu cifre. 

Exemplu: pentru a scrie numarul 3404 se vor aplica stampilele cu cifrele 3 si cu 0, câte o data si stampila cu cifra 4 de doua ori.

*/

#include <iostream>
using namespace std;

int punctul_a(int *arr, int n) {

    int frecv[10] = {0};
    int min_val = 32000;
    int stampila,cifra, stampila_curenta;

    for(int i =0; i < n; i++) {
        stampila_curenta = arr[i];
        while(stampila_curenta) {
            cifra = stampila_curenta % 10;
            stampila_curenta /= 10;
            // Maresc frecventa stampilei
            frecv[cifra]++;
        }
    }

    for(int i =0; i <= 9; i++) {
        if(min_val > frecv[i] && frecv[i] > 0) {
            min_val = frecv[i]; 
            stampila = i;
        }
    }

    return stampila;
}

void punctul_b(int *arr, int n) {

    int frecv[10] = {0};    
    int max = -32000, stampila;
    int stampila_curenta,cifra;

    for(int i =0; i < n; i++) {
        stampila_curenta = arr[i];
        while(stampila_curenta) {
            cifra = stampila_curenta % 10;
            frecv[cifra]++;
            stampila_curenta /= 10;
        }
    }

    // Aflu cifra maxima
    int max_salvat;
    for(int i =0; i < 10; i++) {
        if(frecv[i] > max &&  frecv[i]  > 0) {
            max = frecv[i];
            max_salvat = max;
            stampila = i;
        }
    }

    cout << stampila << " "; 
    while(1) {

        max = -32000;
        bool found = false;
        for(int i =0; i < 10; i++) {
            if(frecv[i] < max_salvat && max < frecv[i] && frecv[i] > 0) {
                stampila = i;
                found = true;
                max = frecv[i];
            }
        }
        max_salvat = max;

        if(!found)
            break;

        cout << stampila << " ";

    }

}

bool sunt_doua(int nr) {

    int cifra;
    int nr_cifre = 0;
    bool * vazut = new bool[10];
    for(int i =0; i < 10; i++)
        vazut[i] = false;
    
    while(nr) {
        cifra = nr % 10;
        
        if(!vazut[cifra]) {
            nr_cifre++;
            vazut[cifra] = true;
        }

        nr /= 10;
    }

    return nr_cifre == 2 ? true: false;

}

void punctul_c(int *arr, int n) {

    int cate_nr = 0,
        stampila_curenta;

    int *ok = new int[n];
    for(int i =0; i < n;i++)
        ok[i] == 0;

    for(int i =0; i < n; i++) {
        stampila_curenta = arr[i];
        
        if(sunt_doua(stampila_curenta)) {
            cate_nr++;
            ok[stampila_curenta] = 1;
        }
    }

    cout << cate_nr << "\n";

    for(int i =0; i < n; i++)
        if(ok[arr[i]] == 1)
            cout << arr[i] << " ";

}

int main () {

    int n;
    int * arr;

    cin >> n;
    arr =  new int[n];

    for(int i =0; i < n;i++)
        cin >> arr[i];

    // cout << punctul_a(arr,n) << "\n";
    // punctul_b(arr,n); cout << "\n";
    punctul_c(arr,n);
    return 0;
}

