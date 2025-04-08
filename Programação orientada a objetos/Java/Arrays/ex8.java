package Arrays;

import java.util.Scanner;

//A linguagem Java oferece uma operação arraycopy(), que copia os valores de um array para outro. 
//A sintaxe é dada por: System.arraycopy( origem, i, destino, j, n ).
//Descubra (consultando bibliografia de referência) como utilizar esta operação para copiar os valores da variável numeros para a variável copia, e construa um programa java para exemplificar.


public class ex8 {
    public static void main(String[] args) {
        int[] A = new int[10];
        Scanner scanner = new Scanner(System.in);

        System.out.println("Digite os valores array A:");
        for (int i = 0; i < 10; i++) {
            System.out.print("Valor " + (i + 1) + ": ");
            A[i] = scanner.nextInt();
        }

        int[] B = new int[A.length];

        System.arraycopy(A, 0, B, 0, A.length);

        System.out.print("Mostrar Array B: ");
        for (int i = 0; i < B.length; i++) {
            System.out.print(B[i] + " ");
        }
        scanner.close();
    }
}
