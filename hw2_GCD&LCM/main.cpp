#include <iostream>
using namespace std;
/* run this program using the console pauser or add your own getch, system("pause") or input loop */

int main(int argc, char** argv) {
	int A,B;//���� 
	int A_g,B_g;//GCD
	cout << "�п�J��ӼƦr(�H�Ů�Ϥ�):";
	cin >> A;
	cin >> B;
	A_g=A;B_g=B;//GCD���� 
	while(A_g!=B_g){
		if(A_g>B_g){
			A_g-=B_g;
		}
		else (B_g-=A_g);
	}
	cout<<"GCD:"<<A_g<<endl;
	int LCM=A*B/A_g;
	cout<<"LCM:"<<LCM<<endl;
	return 0;
}
