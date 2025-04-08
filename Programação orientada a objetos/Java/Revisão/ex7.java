package Revisão;

//Construir um programa JAVA que contenha um método que leia 02 arrays com X e Y com 5 números inteiros. Após criar um novo array R com a multiplicação dos valores dos arrays  X e Y.

import java.util.Scanner;

public class ex7 {
    
    public static int[] Read(int size) {
        Scanner scanner = new Scanner(System.in);
        int[] array = new int[5];
        
        for (int i = 0; i < 5; i++) {
            System.out.print("Digite o elemento " + (i + 1) + ": ");
            array[i] = scanner.nextInt();
        }
        return array;
    }

    public static int[] Mult(int[] A, int[] B) {
        int[] R = new int[A.length];        
        for (int i = 0; i < A.length; i++) {
            R[i] = A[i] * B[i]; 
        }
        return R;
    }

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        System.out.println("Digite os elementos do array A:");
        int[] A = Read(10);
        System.out.println("Digite os elementos do array B:");
        int[] B = Read(10);

        int[] R = Mult(A, B);

        System.out.println("Os elementos do array R são:");
        for (int i = 0; i < R.length; i++) {
            System.out.print(R[i] + " ");
        }
        scanner.close();
    }
}