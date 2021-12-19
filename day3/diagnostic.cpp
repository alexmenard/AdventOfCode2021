#include <iostream>
#include <fstream>
#include <cstring>

using namespace std;

int main() {
    string text;
    ifstream MyReadFile("./input/input_day3.txt");
    string gamma;
    string epsilon;
    int bits[12] = {};
    int count    = 0;
    int count_2  = 0;
    int value    = 0;

    while (getline(MyReadFile, text)) {
        int n = text.length();
        char char_array[n + 1];
       
        strcpy(char_array, text.c_str());        
   
        for (int i = 0; i < n; i++) {
            (char_array[i] != '0') ? value = 1 : value = 0;
            bits[i] += value;
        }

        count++;
    }

    MyReadFile.close();

    for (int b : bits) {
        gamma += (b > (count / 2)) ? '1' : '0';
        epsilon += (b > (count / 2)) ? '0' : '1';

        count_2++;
    }
     
    cout << (stoi(gamma, 0, 2) * stoi(epsilon, 0 ,2)) << endl;
}