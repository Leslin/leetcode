<?php
//单词拆分
/**
	给定一个非空字符串 s 和一个包含非空单词列表的字典 wordDict，判定 s 是否可以被空格拆分为一个或多个在字典中出现的单词。

	说明：

	拆分时可以重复使用字典中的单词。
	你可以假设字典中没有重复的单词。
	示例 1：

	输入: s = "leetcode", wordDict = ["leet", "code"]
	输出: true
	解释: 返回 true 因为 "leetcode" 可以被拆分成 "leet code"。

	来源：力扣（LeetCode）
	链接：https://leetcode-cn.com/problems/word-break
	著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
**/

/**
 * 
 */
function wordBreak($s, $wordDict) {
    $dp = [];//定义状态数组
    $dp[0] = true;//默认第一个状态为0
    for($i=0;$i<strlen($s);$i++){  //对给定的字符串遍历
        if(!$dp[$i]){   //如果为0，则跳出当前循环
            continue;
        }
        foreach($wordDict as $k=>$v){   //遍历给定的字典，得到每个单词
        	//如果当前i+单词的长度小于字符串长度，并且给定的截取字符串等于单词，就表示s中存在一段字符为单词
            if($i+strlen($v) <= strlen($s)  && substr($s,$i,strlen($v)) == $v){
                $dp[$i+strlen($v)] = true;//状态设置为true
            }
        }
    }
    return $dp[strlen($s)];
    }
echo wordBreak('applepenapple',["apple","pen"]);