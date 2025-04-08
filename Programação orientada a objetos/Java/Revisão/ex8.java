package Revisão;

//Construir um programa JAVA que contenha um método que leia 02 arrays com A e B com 5 números inteiros. Após criar um novo array R (10) com a união dos valores dos arrays  A e B.

import java.util.Scanner;

public class ex8 {
    public static int[] Read(int size) {
        Scanner scanner = new Scanner(System.in);
        int[] array = new int[5];
        
        for (int i = 0; i < 5; i++) {
            System.out.print("Digite o elemento " + (i + 1) + ": ");
            array[i] = scanner.nextInt();
        }
        return array;
    }

    public static int[] Conc(int[] A, int[] B) {
        int[] R = new int[A.length + B.length];        
        for (int i = 0; i < A.length; i++) {
            R[i] = A[i]; 
        }
        for (int i = 0; i < B.length; i++) {
            R[A.length] = B[i]; 
        }
        return R;
    }

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        System.out.println("Digite os elementos do array A:");
        int[] A = Read(10);
        System.out.println("Digite os elementos do array B:");
        int[] B = Read(10);

        int[] R = Conc(A, B);

        System.out.println("Os elementos do array R são:");
        for (int i = 0; i < R.length; i++) {
            System.out.print(R[i] + " ");
        }
        scanner.close();
    }
}
