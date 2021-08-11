
# # from itertools import product
# import inspect
# # ADJACENTS = ('08', '124', '2135', '326', '4157', '52468', '6359', '748', '85790', '968')                             

# # for p in product(*(ADJACENTS[1])):
# #     print p # ('1', '2', '4')


# # for i in product(*("Andrei")):
# #     print i # ('A', 'n', 'd', 'r', 'e', 'i')

# # for j in product('a','n','d'):
# #     print j # ('a', 'n', 'd')


# # # print ''.join(('a','n','d')) # and

# # # pin = "11"
# # # for p in product(*(ADJACENTS[int(d)] for d in pin)):
# # #     print p
# # # ('1', '1')
# # # ('1', '2')
# # # ('1', '4')
# # # ('2', '1')
# # # ('2', '2')
# # # ('2', '4')
# # # ('4', '1')
# # # ('4', '2')
# # # ('4', '4')


# # # pin2 = "11"
# # # adj2 = ((0,0,0),("124"),(0,0,0))
# # # for y in product([1,2,4],[1,2,4]): good
# # # for y in product(*(adj[int(d)] for d in pin2)):
# #     # print y



# # #* Convert bidimensional list into tuple
# # adj = [[0,0,0],["124"],[0,0,0]]
# # print adj # List
# # adj = tuple([tuple(i) for i in adj])
# # print adj # Tuple


# # #* Generate combinations.
# # # for c in combinations([1,2,3,4],3):
# # #     print c

# # # for pr in product("ABC",repeat=3):
# # #     print pr

# # k1 = ['1','2','3']
# # k2 = ['4','5','6']



# # #* Ambele fac acelasi lucru ! 
# # print [x+y for x in k1 for y in k2  ]

# # print "======================"

# # for i in product(*("123","456")):
# #     print i




# # # Largest rectangle in histogram

# # # Task : Given a list of heights, determine the largest rectangle in histogram 

# # '''
# # Reasoning
# #     1) We will store the list indexes in a stack
# #     2) We will keep adding to the stack until the element with the top index 
# #         from the stack is grater than the element 
# #         whose index is about to be added to the stack
# #     3) When this happens, we must determine the maximum area found until then
# #     4) After we loop through the list, we apply the same reasoning until the stack is empty        
# # '''

# # # lst = Here you could have some user input or something like that
# # def largestRectangle(lst):

# #     # area - temporary area that will help us determine the maximum area - maxArea
# #     stack,maxArea,area,index = ([],0,0,0)
  
# #     listLength = len(lst)
    
# #     # Loop through the list 
# #     while index < listLength :
        
# #         # print "index",index

# #         # If the stack is empty or the condition is fulfilled : add index to the stack
# #         if not stack or lst[stack[len(stack)-1]] <= lst[index]:
# #             # print "lst[stack[len(stack)-1]]",lst[stack[len(stack)-1]]
# #             stack.append(index)
# #             index += 1
# #         # Now we must determine the max area of that rectangle
# #         else:
# #             # Get the value which has its index on top of the stack
# #             top_stack = lst[stack[len(stack)-1]]

# #             # Get rid of the top index because we don't need it anymore to find the correct rectangle area 
# #             stack.pop()

# #             # Get the temporary area
# #             area = top_stack * (index if not stack else (index - stack[len(stack)-1] - 1))

# #             # Find the maximum area 
# #             maxArea = max(maxArea,area)


# #     # Now we apply the same reasoning until the stack is empty
# #     while stack:
# #         top_stack = lst[stack[len(stack)-1]]
# #         stack.pop()
# #         area = top_stack * (index if not stack else ( index - stack[len(stack)-1] - 1))
# #         maxArea = max(maxArea,area)
    
# #     return maxArea



# # print largestRectangle([6, 2, 5, 4, 5, 1, 6]) # 12

# # print largestRectangle([4,2,3,5]) # 8




# #   Min Cost Path

# #  References : https://www.geeksforgeeks.org/dynamic-programming-set-6-min-cost-path/

# '''
#  Given a cost matrix and a positon, write a function that returns cost of minimum
#  cost path to reach that position, starting from 0

#  You can only travers down,right and diagonally
# '''

# '''
# Exaple : 

#  1 2 3 
#  4 8 2
#  1 5 3

# Output : 
# 8 (0,0 -> 0,1 -> 1,2 ->2,2) = 1 + 2 + 2 + 3

# '''

# '''
# Reasoning {
#     1) Notice that, for the position given, the min cost neighbor is the minimum value between {
#         a) cost[n-1][m-1] - diagonal
#         b) cost[n-1][m] - up
#         c) cost[n][m-1] - left
#     }
#     2) Instead of using a recursive function, that will slow our execution, we can use a temporary array
# }
# '''


# # # n,m - coordinates for the position to be reached
# # def mcp(cost,n,m):
    
# #     # Temporary matrix -  it is empty at the beginning
# #     temp = [[0 for j in range(len(cost[0]))] for i in range(len(cost))]

# #     # Set the first element in the temporary matrix, so we can fill the other empty items
# #     temp[0][0] = cost[0][0]

# #     # Fill the first column with the cost path from top left to bottom left
# #     for i in range(1,n):
# #         temp[i][0] = temp[i-1][0] + cost[i][0]

# #     # Fill the first row with the cost path from top left to top right
# #     for j in range(1,m):
# #         temp[0][j] = temp[0][j-1] + cost[0][j]

# #     '''
# #     Based on the given matrix, we would have something like this (if m=n=3)
# #     temp = 1 3 6
# #            5
# #            6 
# #     ''' 

# #     # Fill the other items in temp matrix
# #     for i in range(1,len(cost)):
# #         for j in range(1,len(cost[0])):
# #             # temp[i][j] will equal to the min between the 3 neighbors(temp[n-1][m-1] etc..) +  plus the actual value from cost matrix
# #             temp[i][j] = min(temp[i-1][j-1],temp[i-1][j],temp[i][j-1]) + cost[i][j]

# #     # Return the value temp matrix has at the specified position
# #     return temp[n-1][m-1]


# # cost = [[1, 2, 3],
# #         [4, 8, 2],
# #         [1, 5, 3]]

# # print mcp(cost,3,3) # 8


# # cost2 = [[3, 1, 3,6],
# #         [4, 10, 1,1],
# #         [3, 0, 4,10]]

# # print mcp(cost2,3,2) # 7

# # import functools
# # def memoize(func):
# #     cache = func.cache = {}

# #     print "CACHE : ",cache

# #     @functools.wraps(func) # Get information about the function that is being decorated by memorize.
# #     def memoized_func(*args, **kwargs):
# #         print "function : ", func
# #         key = str(args) + str(kwargs)
# #         print "key", key
# #         if key not in cache:
# #             cache[key] = func(*args, **kwargs)
# #         return cache[key]

# #     return memoized_func

# # @memoize
# # def fibonacci(n):
# #     print "n : ",n
# #     if n == 0:return 0
# #     if n == 1:return 1
# #     else: return fibonacci(n-1) + fibonacci(n-2)



# # print fibonacci.__doc__ 
# # print fibonacci.__name__
# # print fibonacci(7)
# # print fibonacci(7)
# # print fibonacci(7)
# # print fibonacci(4)
# # // funciton name


# #! De revazut

# # https://stackoverflow.com/questions/1988804/what-is-memoization-and-how-can-i-use-it-in-python

# #https://www.geeksforgeeks.org/python-random-password-generator-using-tkinter/



# str = "andrei"
# # print (str[::-1]) # ierdna



# # 1
# memo = []
# def func(n,x):
#     if n == 1: return x
#     elif n == 2: return x-2
#     else:
#         memo.append(func(n-1,x))
#         memo.append(func(n-2,x))
#         memo.append( x*func(n-1,x) - func(n-2,x))
#         return x*func(n-1,x) - func(n-2,x)


# from collections import OrderedDict
# # Cu formkeys() luam cheile unice

# # print(func(3,6)) # 18
# # print OrderedDict.fromkeys(memo).keys() # [4, 6, 18]
# # memo = [] # Golim lista

# # print(func(4,6)) # 18
# # print OrderedDict.fromkeys(memo).keys() # [4, 6, 18, 104]
# # memo = []  # Golim lista

# # 2
# cache = {}
# def mem(n,x):
#     # If we have the cached value, return it
#     if n in cache:
#         return cache[n]

#     # Get the value
#     if n == 1:
#         value = x
#     elif n == 2:
#         value = x-2
#     else:
#         value = x*mem(n-1,x) - mem(n-2,x)

#     # Cache the value
#     cache[n] = value
#     return value


# print mem(3,6) # 18 
# print sorted(cache.values()) # [4, 6, 18]
# print mem(4,6) # 104
# print sorted(cache.values()) # [4, 6, 18, 104]

# print ('')
# print ('')
# print ('')
# print ('')
# # 3
# def mem(func):
#     cache = {} # Decorator's scope
#     def wrapper(*args):
#         key = '{}'.format(args[0])
#         if key in cache:
#             return cache[key]

#         # Get the value
#         value = int(args[1])*func(int(args[0]-1),int(args[1])) - func(int(args[0])-2,int(args[1]))

#         # Cache the value
#         cache[key] = value
#         return value
#     return wrapper

# @mem
# def polinom(n,x):
#     if n == 1: return x
#     elif n == 2: return x-2
#     else:
#         return x*func(n-1,x) - func(n-2,x)

# print polinom(3,6) # 18

# Smallest subarray with sum greater than a given value

# def minSubArr(lst,x):
#     # minLength = the subarray might also be the entire array, which means it is not possible to get a subarray
#     s,minLength,n = 0,len(lst)+1,len(lst)


#     start,end = 0,0

#     while end < n:

#         # Add elements until the sum reaches a value greater than x
#         while s <= x and end < n: # (end < n) - we need to verify the condition here as well
#             print('start : {0}, end : {1}, sum :{2} '.format(start,end,s))
#             # If the sum is less than or eqal to 0, it means we might have encountered negative numbers
#             # We must skip any subbarray that contains negative numbers
#             # Because later on, we might need to remove starting elements in order to get the smallest subarray
#             if s <= 0 and x > 0:
#                 start = end
#                 s = 0 # Reinitialize the sum

#             s += lst[end]
#             end = end + 1
#         print('AFTER FIRST WHILE : start : {0}, end : {1}, sum :{2} '.format(start,end,s))
#         # Remove starting elements if needed
#         while s > x and start < n:
#             minLength = min(minLength,end-start)
#             print('min length : {0}, start : {1}, end : {2}, current sum : {3}'.format(minLength,start,end,s))
#             s -= lst[start]
#             start = start + 1 
#     print('start : {0}, end : {1}, sum :{2} '.format(start,end,s))
#     return minLength


# lst = [1,4,45,6,0,19]
# x = 51 
# print(minSubArr(lst,x)) # 3

# lst2 = [- 8, 1, 4, 2, -6]
# x = 6
# print(minSubArr(lst2,x)) # 3


# Find common letters of 2 string
# str1 = "cat"
# str2 = "rat"

# # 1 - using Counter - which will count occurrences of every character in a string/list
# from collections import Counter
# # Get an array of strings so we can use Counter
# strings = [str1,str2]
# print(strings) # ['cat', 'rat']

# occurrences = [Counter(s) for s in strings] # [Counter({'a': 1, 'c': 1, 't': 1}), Counter({'a': 1, 'r': 1, 't': 1})]
# print(occurrences)

# res = occurrences[0] & occurrences[1]
# print(sum(res.values())) # 2 - 
# print(res.keys()) # ['a', 't']

# # 2 - using set()
# print set(str1) & set(str2) # set(['a', 't']) 

# # 3 - using Counter with index counting
# chars_with_index = [zip(s,range(len(s))) for s in strings]
# print chars_with_index # [[('c', 0), ('a', 1), ('t', 2)], [('r', 0), ('a', 1), ('t', 2)]]

# counters = [Counter(zip(s,range(len(s)))) for s in strings]
# print counters # [Counter({('a', 1): 1, ('c', 0): 1, ('t', 2): 1}), Counter({('r', 0): 1, ('a', 1): 1, ('t', 2): 1})]

# # A dictionary is returned
# dct =  counters[0] & counters[1]
# print dct # Counter({('a', 1): 1, ('t', 2): 1})
# print dct.items() # [(('a', 1), 1), (('t', 2), 1)]
# print dct.values() # [1,1]


# Given a number "n", return a strictly increasing sequence of numbers, such that the sum of the squares is equal tu n*n

# def solve(n):
#     def rec(n2,i):
#         if n2 < 0:
#             return None
#         if n2 == 0:
#             return []
#         for i in xrange(i-1,0,-1):
#             prev = rec(n2-i**2,i)
#             if prev != None:
#                 return prev + [i]
#     return rec(n**2,n)

# print solve(7)

# Validate Sudoku with size NxN

# Link to the task : https://www.codewars.com/kata/validate-sudoku-with-size-nxn/train/python

# from math import sqrt
# class Sudoku(object):
     
#     def __init__(self,data):
#         # object.__init__(data)
#         self.data = data

#     def is_valid(self):
#         N = len(self.data)
#         M = len(self.data[0])
#         S = N * (N+1)//2;
#         # If it is not NxN
#         if(N != M ): return False
#         # If it is not squared
#         if(N % 1 != 0): return False
#         if(N==1 and self.data[0][0] == '' or self.data[0][0] <=0   or self.data[0][0] > N): return False;
        
        
#         # Sum on row
#         sumRow = [0 for i in range(N)]
#         # Sum on column
#         sumCol = [0 for i in range(N)]
#         # Sum in box - sqrt(N) x sqrt(N)
#         sumBox = [[0 for j in range(int(sqrt(N)))] for i in range(int(sqrt(N)))]
        
#         # Loop through the matrix
#         for i in range(N):
#             for j in range(N):
#                 if(str(self.data[i][j]).isalpha()): return False
#                 if self.data[i][j] <=0 or self.data[i][j] > N: return False
#                 #if ord(str(self.data[i][j])) > 57 and ord(str(self.data[i][j])) < 48 : return False
#                 # Get the sum on the row
#                 sumRow[i] += self.data[i][j]
#                 # Get the sum on the column
#                 sumCol[j] += self.data[i][j]
#                 # Get the sum in the box
#                 sumBox[i//int(sqrt(N))][j//int(sqrt(N))] += self.data[i][j]
#         # I guess that's how you deal with "all()" when there is a multi-dimensional array
#         if  all(all(sumBox[i][j] ==S for j in range(int(sqrt(N)))) for i in range(int(sqrt(N)))) == False: return False
#         return all(lambda x:x == S for x in sumCol) and all(lambda y:y == S for y in sumRow)


# goodSudoku1 = Sudoku([
#   [7,8,4, 1,5,9, 3,2,6],
#   [5,3,9, 6,7,2, 8,4,1],
#   [6,1,2, 4,3,8, 7,5,9],

#   [9,2,8, 7,1,5, 4,6,3],
#   [3,5,7, 8,4,6, 1,9,2],
#   [4,6,1, 9,2,3, 5,8,7],
  
#   [8,7,6, 3,9,4, 2,1,5],
#   [2,4,3, 5,6,1, 9,7,8],
#   [1,9,5, 2,8,7, 6,3,4]
# ])

# print goodSudoku1.is_valid()

# arr = [2,2,2,2]
# print all(not x % 2 for x in arr) # True
# print all(lambda x:not x%2 for x in arr) # True

# arr = [[45, 45, 45], [45, 45, 45], [45, 45, 45]]
# print all(all(arr[i][j] ==45 for j in range(3)) for i in range(3)) # True




# Find index of first occurrence when unsorted array is sorted

# Solution : count the elements smaller than x
# def findIndex(lst,x):
#     # We will also check if it exists
#     exists,counter = False,0
#     for i in lst:
#         if i == x: # Make sure the element exists
#             exists = True
#         elif i < x:
#             counter += 1

#     return counter if exists else "The element does not exist"

# lst = [12, 31, 19, 16, 4]
# x = 16
# print findIndex(lst,x) # 2


# # Find occurrences in a list

# #? Reference : https://stackoverflow.com/questions/6294179/how-to-find-all-occurrences-of-an-element-in-a-list

# lst = [1,3,0,1,2,3,3,1,2,0]

# # First alternative
# #* enumerate() - returns a tuple for every element from the list which contains the index and the value
# # for i,val in enumerate(lst):
#     # print i, val
# # Count the occurrences of digit "1"
# indices = [i for i,x in enumerate(lst) if x == 1]
# print indices # [0, 3, 7]

# # Second alternative
# #* locate ()  - find indices for all items that satisfy a condition
# from more_itertools import locate
# print list(locate(lst)) # [0, 1, 3, 4, 5, 6, 7, 8] - indeces of not null elements
# # Add a condition
# print list(locate(lst, lambda x:x == 2)) # [4, 8]


# # Third alternative 
# import numpy as np # numpy -used for data science...
# values = np.array(lst)
# searcVal = 3
# # where - condition[x,y] = output contains elements of x where contidition is True
# index = np.where(values == searcVal) # where :https://docs.scipy.org/doc/numpy/reference/generated/numpy.where.html#numpy.where
# print index # (array([1, 5, 6]),)
# print list(index[0]) # [1, 5, 6]


# # Fourth alternative - using lambda
# occurrences = lambda x, lst : (i for i,e in enumerate(lst) if e == x)
# print list(occurrences(1,lst)) # [0, 3, 7]



# # Fifth alternative - number of occurrences -using defaultdict Dictionary
# from collections import defaultdict

# countArr  = defaultdict(int)

# for elem in lst:
#     countArr[elem] = lst.count(elem)
# print dict(countArr) # {0: 2, 1: 3, 2: 2, 3: 3}


# # Sixth alternative - using Counter
# from collections import Counter
# cnt = Counter(lst)
# print dict(cnt) # {0: 2, 1: 3, 2: 2, 3: 3}


# print dict(set(Counter(enumerate(lst)))) # {0: 1, 1: 3, 2: 0, 3: 1, 4: 2, 5: 3, 6: 3, 7: 1, 8: 2, 9: 0}

# #* lst =[1,3,0,1,2,3,3,1,2,0]

# # Find the most common element

# #? Reference : https://stackoverflow.com/questions/1518522/find-the-most-common-element-in-a-list

# # First alternative
# print(max(set(lst), key = lst.count)) # 1

# # Second alternative
# data = Counter(lst)
# print data.most_common(1); # [(1, 3)]

# # data.get - returns the occurrences for an element 
# print max(lst,key = data.get) # 1

# print dict(data) # {0: 2, 1: 3, 2: 2, 3: 3}
# print data.get(0) # 2
# print data.get(3) # 3


# # Get the min non-zero value
# import numpy as np
# a  = [2,0,3,9,12,31,21,2,0]


# # First alternative
# arr = np.array(a)
# # Get rid of 0
# nonZero = arr[ arr != 0]
# print nonZero # [ 2  3  9 12 31 21  2]
# print nonZero.max() # 31
# print nonZero.min() # 2


# # Second alternative
# # masked_equal () - mask an array where equal to a given value
# ma = np.ma.masked_equal(arr,0,copy= False)

# print ma.max() # 31
# print ma.min() # 2

# # Third alternative - using generator expression
# print max([x for x in a if x != 0]) # 31
# print min([x for x in a if x != 0]) # 2


# import numpy as np
# arr = np.array([2,0,3,9,12,31,21,2,0])

# # ma = np.ma.masked_equal(arr,max(arr),copy=False)
# # ma[0] = 99 
# # print arr # [2, 0, 3, 9, 12, 31, 21, 2, 0]


# # print ma.max() # 99


# ma1 = np.ma.masked_equal(arr,max(arr),copy=True)
# ma1[0] = 111
# print ma1
# print arr

# #* "copy" argument
# import numpy as np
# a = np.arange(4)
# print a  # [0 1 2 3]

# c = np.ma.masked_where(a <=2, a, copy=False)
# print c # [-- -- -- 3]
# c[0] = 99
# print c # [99 -- -- 3]
# print a # [99  1  2  3]  



# Fibonacci Memoization

# cache = {}
# def fib(n):
#     if n in cache:
#         return cache[n]
    
#     if n == 1:
#         value = 1
#     elif n == 2:
#         value =1
#     elif n > 2:
#         value = fib(n-1) + fib(n-2)

#     # Cache the value
#     cache[n] = value
#     return value



# for i in range(1,1000):
#     print fib(i)

# #* Find the most Common Elements in list

# groceries = ['apple','banana','banana', 'orange','banana','apple','beet','carrot','ginger','kale','ginger','ginger','kale','ginger']

# # Find the most 2 common
# from collections import Counter
# cnt = Counter(groceries)
# print cnt.most_common(2) # [('ginger', 4), ('banana', 3)]
# print sorted(zip(cnt.values(),cnt.keys()),reverse=True) # [(4, 'ginger'), (3, 'banana'), (2, 'kale'), (2, 'apple'), (1, 'orange'), (1, 'carrot'), (1, 'beet')]
# print cnt.most_common() # [('ginger', 4), ('banana', 3), ('apple', 2), ('kale', 2), ('carrot', 1), ('beet', 1), ('orange', 1)]


# # Print them in desc order by their occurrences

# from collections import defaultdict
# cnt1 = defaultdict(list)
# for i in groceries:
#     cnt1[i] = groceries.count(i)
# print sorted(cnt1.items(),key=lambda item:item[1],reverse=True) # [('ginger', 4), ('banana', 3), ('apple', 2), ('kale', 2), ('carrot', 1), ('beet', 1), ('orange', 1)]




# # Matrix determinant 

# # https://www.codewars.com/kata/52a382ee44408cea2500074c/solutions/python

# # First Solution
# def determinant(m):
#     det = 0
#     if len(m) == 1:
#         det = m[0][0]
#     else:
#         for col in xrange(len(m)):
#             filteredMatrix = determinant([o[:col] + o[col+1:] for o in m[1:]])
#             result = m[0][col] * filteredMatrix
#             if (col + 1) % 2 == 0:
#                 det -= result
#             else:
#                 det += result
                
#     return det

# mat2 = [[2,5,3], [1,-2,-1], [1, 3, 4]] 
# print(determinant(mat2))


# # Second Solution
# import numpy as np
# # linalg - Linear algebra
# # linalg.det() - Compute the determinant of an array
# def determinant2(m):
#     return '{:.0f}'.format(np.linalg.det(mat2))
# print determinant2(mat2)




# # format() function - allows you to do variable substitutions and value formatting

# # https://www.digitalocean.com/community/tutorials/how-to-use-string-formatters-in-python-3

# # Use of a keyword argument and positional argument
# str1 = "My name is {name} and I'm {0} years old".format(17,name="Andrei")
# print str1 # My name is Andrei and I'm 17 years old

# #* Specifying type
# # Syntax : {field_name:conversion}
# # field_name -  index
# # conversion - conversion code of the data type
# '''
# Conversion Types:
# s - string
# d - decimal integers(10 base)
# f - float with decimal points
# '''
# str2 = "I ate {0:f} percent of a {1}!".format(75,"pizza")
# print str2 # I ate 75.000000 percent of a pizza!

# # "n" decimals
# str3 = "I ate {0:.3f} percent of a {1}!".format(75.39192,"pizza")
# print str3 # I ate 75.392 percent of a pizza!

# # No decimals
# str4 = "I ate {0:.0f} percent of a {1}!".format(75.39192,"pizza")
# print str4 # I ate 75 percent of a pizza!


# #* Padding Variable Substitutions
# # Add a number to indicate the field size(in terms of characters) after the color ":"
# str5 = "I have {0:4} red {1:16} a".format(5,"balloons")
# print str5 # I have    5 red balloons         a
# #* By default, strings are left-justified within the field
# #* Numbers are right-justified

# '''
# Modify the alignment
# < - left-align
# ^ - center 
# > - right align
# '''
# str6 = "I have {0:<4} red {1:^16} !".format(5,"balloons")
# print str6 # I have 5    red     balloons     !


# #* By default, the fileds will be filled with whitespace characters
# #* Modify that pe specifying the character we want directly following the column
# str7 = "{:*^20s}".format("Andrei")
# print str7 # *******Andrei*******
# str8 = "{:-^10d}".format(17)
# print str8 # ----17----
# str9 = "{age:&^20}".format(age=17)
# print str9 # &&&&&&&&&17&&&&&&&&&
# str10 = "{:*<10d}".format(3)
# print str10 # 3*********

# #* Using Formatters to organize data

# for i in range(3,13):
#     print "{:3d} {:4d} {:5d}".format(i,i*i,i*i*i)
#     '''
#     3    9    27
#     4   16    64
#     5   25   125
#     6   36   216
#     7   49   343
#     8   64   512
#     9   81   729
#     10  100  1000
#     11  121  1331
#     12  144  1728
# `
#     '''
#     # print "{:*>3d} {:#>4d} {:!>5d}".format(i,i*i,i*i*i)




# # Formatting a list using format() function

# # https://stackoverflow.com/questions/21256889/map-string-formatting-to-a-list-of-numbers

# lst = [1.003,2.004,3.005]
# res = " ".join(map("{:.2f}".format,lst))
# print res # 1.00 2.00 3.00

# res2= " ".join("{:.2f}".format(x) for x in lst)
# print res2 # 1.00 2.00 3.00


# # decimal module - provides support for decimal floating point arithmetic
# from decimal import *

# # quantize() - rounds a number to a fixed exponent
# print Decimal('7.325').quantize(Decimal('0.1'),rounding=ROUND_DOWN) # 7.3
# print Decimal('7.325').quantize(Decimal('0.1'),rounding=ROUND_UP) # 7.4
# print Decimal('7.325').quantize(Decimal('1.'),rounding=ROUND_UP) # 8
# print Decimal('7.325').quantize(Decimal('.01'),rounding=ROUND_UP) # 7.33
# print Decimal('7.325').quantize(Decimal('.01'),rounding=ROUND_DOWN) # 7.32
# print Decimal('7.325').quantize(Decimal('.01'),rounding=ROUND_HALF_UP) # 7.33
# print Decimal('7.325').quantize(Decimal('.01'),rounding=ROUND_HALF_DOWN) # 7.32
# print Decimal('7.324').quantize(Decimal('.01'),rounding=ROUND_HALF_UP) # 7.32
# print Decimal('7.324').quantize(Decimal('.01'),rounding=ROUND_UP) # 7.33


# # Get the current context : precision, rounding etc
# print getcontext()

# a = [1.003,2.004,3.005]
 
# res = " ".join(map(lambda x : str(Decimal(str(x)).quantize(Decimal('.01'),rounding = ROUND_HALF_DOWN)),a))
# print res # 1.00 2.00 3.00


# # The Inventing Factor

# # https://practice.geeksforgeeks.org/problems/the-inverting-factor/0

# '''
# 5
# 56 20 47 93 45

# Output : 
# 9, of the pair (56,47)
# '''

# def reverse(num):
#     # return str(num)[::-1]
#     inv = 0
#     while num:
#         inv = inv * 10 + num%10
#         num /= 10
#     return inv

# def solve(arr):
#     length = len(arr)
#     # print length
#     if length == 2:
#         return abs(reverse(arr[0]) - reverse(arr[1]))

#     # Get the array of reversed elements from the given array, then sort it
#     reverse_arr = [reverse(elem) for elem in arr]
#     reverse_arr.sort()

#     # Initialize the min value
#     minVal = abs(reverse_arr[0] - reverse_arr[1])
    
#     for index in range(1,len(reverse_arr) - 1):
#         minVal = min(minVal,abs(reverse_arr[index] - reverse_arr[index+1]))

#     return minVal


# print solve([56,20,47,93,45])


#* Lorem ipsum generator
# todo : https://www.youtube.com/watch?v=iLS4Hk-kJXE


# todo : https://github.com/keon/algorithms/blob/master/algorithms/matrix/rotate_image.py
# https://github.com/pedrovgs/Algorithms/blob/master/src/main/java/com/github/pedrovgs/problem62/PalindromeList.java
# https://github.com/prakhar1989/Algorithms/blob/master/graphs/digraph.py


# Generate abbreviations

# https://github.com/keon/algorithms/blob/master/algorithms/backtrack/generate_abbreviations.py

def generate_abbreviations(word):

    def backtrack(result, word, pos, count, cur):
        if pos == len(word):
            if count > 0:
                cur += str(count)
            result.append(cur)
            return

        if count > 0:  # add the current word
            backtrack(result, word, pos+1, 0, cur+str(count)+word[pos])
        else:
            backtrack(result, word, pos+1, 0, cur+word[pos])
        # skip the current word
        backtrack(result, word, pos+1, count+1, cur)

    result = []
    backtrack(result, word, 0, 0, "")
    return result

print generate_abbreviations("word")
# https://medium.com/@antash/six-ways-to-find-max-value-of-a-list-in-python-b7d7ccfabc0d


