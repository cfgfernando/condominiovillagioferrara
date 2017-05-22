<?
    function db_connect($host,$user,$senha){
        $res = @mysql_connect($host,$user,$senha);
		return $res;
    }
	
	function db_select_db($sql){
        $res = @mysql_select_db($sql);
		return $res;
    }
	
    function db_query($sql){
        $res = @mysql_query($sql);
		return $res;
    } 

    function db_num_rows($res){
		$numrows = @mysql_num_rows($res);
        return $numrows;
    }

    function db_affected_rows(){        
        $num_rows = @mysql_affected_rows();
        return $num_rows;
    }

    function db_fetch_array($res){        
		$reg = @mysql_fetch_array($res);
        return $reg;
    }

    function db_result($res, $coluna, $linha=0){        
		$result = @mysql_result($res, $linha, $coluna);
		return $result;
    }

    function db_free_statment(&$res){
		@mysql_free_result($res);
    }

    function db_close($con=false){
		@mysql_close($con);
    }

    function db_error(){
		$erro = mysql_error();
		return $erro;
    }
	
	function db_insert_id(){
		return mysql_insert_id();
	}


?>