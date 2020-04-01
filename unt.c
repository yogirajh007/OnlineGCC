#include<stdio.h>
#include<ctype.h>

typedef struct stack
{
    int data[50]; //stack array
    int top; //pointer to top
}stack;

int precedence(char);
void init(stack *);
int empty(stack *);
int top(stack *p);
int full(stack *s);
void push(stack *s, int x);
int pop(stack *s);
void convert(char infix[],char postfix[])

void main()
{
    char infix[50],postfix[50];
    printf("Enter an infix expression: ");
    gets(infix);
    convert(infix,postfix); //function call to convert
    printf("\n PF is %s \n",postfix);
       
}
void convert(char infix[],char postfix[])
{
    stack s;
    char x,token; //token is the current scanned element
    int i,j;
    init(&s); //initialising the structure
    j=0;
    for(i=0; infix[i]!='\0'; i++)
    {
        token=infix[i];
        if(isalnum(token))
            postfix[j++]=token; //adding token into postfix array
        else
            if(token=='(')
                push(&s,'(');
        else
            if(token==')')
                while((x=pop(&s))!='(')
                    postfix[j++]=x;
            else
            {
                while(precedence(token)<=precedence(top(&s))&&!empty(&s))
                    {
                        x=pop(&s);
                        postfix[j++]=x;
                    }
                    push(&s,token);
            }
       
    }
    while(!empty(&s))
    {
        x=pop(&s);
        postfix[j++]=x;
   
    }
    postfix[j]='\0';

}

int precedence(char x)
{
    if(x=='(')
        return (0);
    if(x=='+'||x=='-')
        return (1);
    if(x=='*'||x=='/')
        return (2);

    return (3);
}

void init(stack *s)
{   
    s->top = -1; //actually, new function is not required, could've been done into main()???
}
int empty(stack *s)
{
    if(s->top==-1)
        return (1);
    return (0);
}
int full(stack *s)
{
        if (s->top=49)
            return (1);
        return (0);
}
void push(stack *s, int x)
{
    s->top=s->top+1;
    s->data[s->top]=x;
}
int pop(stack *s)
{
    int x;
    x=s->data[s->top];
    s->top=s->top-1;
    return (x);
}

int top(stack *p)
{
    return(p->data[p->top]);
}