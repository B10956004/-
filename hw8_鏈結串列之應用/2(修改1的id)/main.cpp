#include <iostream>
using namespace std;
/* run this program using the console pauser or add your own getch, system("pause") or input loop */

int main(int argc, char** argv) {
	int id=10956004;
	int *p;
	p=&id;
	cout<<"��id��:"<<id<<endl;
	cout<<"��p��:"<<*p<<endl;
	cout<<"��J�ק�id:"; 
	cin>>id;
	cout<<"�ק�id��:"<<id<<endl;
	cout<<"�ק�p��:"<<*p<<endl; 
	system("pause");
	return 0;
}
