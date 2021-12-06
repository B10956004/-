#include <iostream>
using namespace std;
/* run this program using the console pauser or add your own getch, system("pause") or input loop */

int main(int argc, char** argv) {
	int id=10956004;
	int *p;
	p=&id;
	cout<<"id值:"<<id<<endl;
	cout<<"id位址:"<<&id<<endl;
	cout<<"p存取位址:"<<p<<endl;
	cout<<"p值:"<<*p<<endl;
	cout<<"p本身位址"<<&p<<endl; 
	system("pause");
	return 0;
}
