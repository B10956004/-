#include <iostream>
using namespace std;
/* run this program using the console pauser or add your own getch, system("pause") or input loop */

int main(int argc, char** argv) {
	int id=10956004;
	int *p;
	p=&id;
	cout<<"原id值:"<<id<<endl;
	cout<<"原p值:"<<*p<<endl;
	cout<<"輸入修改id:"; 
	cin>>id;
	cout<<"修改id值:"<<id<<endl;
	cout<<"修改p值:"<<*p<<endl; 
	system("pause");
	return 0;
}
