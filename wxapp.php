<?php
goto IJMBi;
Lva4n:
defined("TD_PATH") or define("TD_PATH", __DIR__);
goto oUrZb;
IJMBi:
defined("IN_IA") or exit("Access Denied");
define("IP", "api.feieyun.cn");
define("PORT", 80);
define("PATH", "/Api/Open/");
define("STIME", time());
$printing = pdo_get("ymktv_sun_printing", array("uniacid" => $_W["uniacid"]));
// halt($printing);
define("USER", $printing["user"]);
define("UKEY", $printing["key"]);
define("SIG", sha1(USER . UKEY . STIME));

goto Lva4n;
oUrZb:
require_once TD_PATH . "/class/func.php";
goto aRQLp;
aRQLp:
class ymktv_sunModuleWxapp extends WeModuleWxapp
{
    public function doPageOpenid()
    {
        goto AZzhY;
        ufWzA:
        $url = "https://api.weixin.qq.com/sns/jscode2session?appid=" . $appid . "&secret=" . $secret . "&js_code=" . $code . "&grant_type=authorization_code";
        // var_dump($url);die;
        goto M3HJD;
        AZzhY:
        global $_W, $_GPC;
        goto rhEZ1;
        o2IWt:
        $res = httpRequest($url);
        goto X0mIG;
        rhEZ1:
        $res = pdo_get("ymktv_sun_system", array("uniacid" => $_W["uniacid"]));
        // var_dump($res);die;
        goto Dmvmf;
        Dmvmf:
        $code = $_GPC["code"];
        goto vLY_P;
        vLY_P:
        $appid = $res["appid"];
        goto T1C6x;
        M3HJD:
        function httpRequest($url, $data = null)
        {
            goto a37Wh;
            YPw8g:
            $output = curl_exec($curl);
            goto P9Tk5;
            d7CVe:
            cqz8f:
            goto V5acj;
            jI_xl:
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
            goto DNQKb;
            a37Wh:
            $curl = curl_init();
            goto eW2g6;
            eW2g6:
            curl_setopt($curl, CURLOPT_URL, $url);
            goto JcJvb;
            X66ac:
            return $output;
            goto nn4Mj;
            DNQKb:
            if (empty($data)) {
                goto cqz8f;
            }
            goto xdYOC;
            Zv3RX:
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            goto d7CVe;
            P9Tk5:
            curl_close($curl);
            goto X66ac;
            xdYOC:
            curl_setopt($curl, CURLOPT_POST, 1);
            goto Zv3RX;
            V5acj:
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            goto YPw8g;
            JcJvb:
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
            goto jI_xl;
            nn4Mj:
        }
        goto o2IWt;
        T1C6x:
        $secret = $res["appsecret"];
        goto ufWzA;
        X0mIG:
        print_r($res);
        goto SK8Ej;
        SK8Ej:
    }
    public function doPageLogin()
    {
        goto mU6Bb;
        r9xOH:
        $data["gender"] = $_GPC["gender"];
        goto lU487;
        mU6Bb:
        global $_GPC, $_W;
        goto YmyGe;
        jG0r9:
        $user = pdo_get("ymktv_sun_user", array("openid" => $openid, "uniacid" => $_W["uniacid"]));
        goto P6rB1;
        JasT_:
        echo json_encode($user);
        goto QYRw2;
        m2vnv:
        ihNXy:
        goto ConEJ;
        P6rB1:
        echo json_encode($user);
        goto m2vnv;
        lU487:
        $res = pdo_update("ymktv_sun_user", $data, array("id" => $user_id));
        goto jG0r9;
        hADSf:
        $data["img"] = $_GPC["img"];
        goto QR_OJ;
        uCEbb:
        $data["img"] = $_GPC["img"];
        goto psNYQ;
        bNyTw:
        $user_id = $res["id"];
        goto KSy_i;
        EYtgN:
        if ($res) {
            goto YP5hV;
        }
        goto JdgtD;
        ConEJ:
        Xs0uk:
        goto mU6Po;
        pKLzM:
        $res2 = pdo_insert("ymktv_sun_user", $data);
        goto QTlGg;
        JifIn:
        $res = pdo_get("ymktv_sun_user", array("openid" => $openid, "uniacid" => $_W["uniacid"]));
        goto H1l8h;
        H1l8h:
        if (!($openid and $openid != "undefined")) {
            goto Xs0uk;
        }
        goto EYtgN;
        wIg64:
        $data["gender"] = $_GPC["gender"];
        goto zbTx2;
        YmyGe:
        $openid = $_GPC["openid"];
        goto JifIn;
        zbTx2:
        $data["time"] = time();
        goto pKLzM;
        QTlGg:
        $user = pdo_get("ymktv_sun_user", array("openid" => $openid, "uniacid" => $_W["uniacid"]));
        goto JasT_;
        QR_OJ:
        $data["name"] = $_GPC["name"];
        goto r9xOH;
        psNYQ:
        $data["name"] = $_GPC["name"];
        goto sP36E;
        JdgtD:
        $data["openid"] = $_GPC["openid"];
        goto uCEbb;
        SSwYr:
        YP5hV:
        goto bNyTw;
        QYRw2:
        goto ihNXy;
        goto SSwYr;
        KSy_i:
        $data["openid"] = $_GPC["openid"];
        goto hADSf;
        sP36E:
        $data["uniacid"] = $_W["uniacid"];
        goto wIg64;
        mU6Po:
    }
    public function doPageAd()
    {
        goto PSG1I;
        sNiRG:
        gdzo8:
        goto ZQFJR;
        x0hDH:
        $data[":name"] = $_GPC["cityname"];
        goto sNiRG;
        ZQFJR:
        $data[":uniacid"] = $_W["uniacid"];
        goto VrIvF;
        xMgUx:
        if (!$_GPC["cityname"]) {
            goto gdzo8;
        }
        goto W90Ci;
        VrIvF:
        $sql = "select * from " . tablename("ymktv_sun_ad") . $where . " order by orderby asc";
        goto yUpN2;
        PSG1I:
        global $_GPC, $_W;
        goto H2hSJ;
        yUpN2:
        $res = pdo_fetchall($sql, $data);
        goto a68EA;
        H2hSJ:
        $where = " where uniacid=:uniacid and status=1";
        goto xMgUx;
        W90Ci:
        $where .= " and cityname LIKE  concat('%', :name,'%')";
        goto x0hDH;
        a68EA:
        echo json_encode($res);
        goto lpqvw;
        lpqvw:
    }
    public function doPageUrl()
    {
        global $_GPC, $_W;
        echo $_W["attachurl"];
    }
    public function doPageUrl2()
    {
        global $_W, $_GPC;
        echo $_W["siteroot"];
    }
    public function doPageType()
    {
        goto kr2oz;
        kr2oz:
        global $_GPC, $_W;
        goto PguvG;
        PguvG:
        $res = pdo_getall("ymktv_sun_type", array("uniacid" => $_W["uniacid"], "state" => 1), array(), '', "num asc");
        goto i_tua;
        i_tua:
        echo json_encode($res);
        goto dXPwt;
        dXPwt:
    }
    public function doPageType2()
    {
        goto awe12;
        tOrxz:
        $res = pdo_getall("ymktv_sun_type2", array("type_id" => $_GPC["id"]), array(), '', "num asc");
        goto L7D1z;
        awe12:
        global $_GPC, $_W;
        goto tOrxz;
        L7D1z:
        echo json_encode($res);
        goto ojIk5;
        ojIk5:
    }
    public function doPagePosting()
    {
        goto zggbl;
        dnrue:
        $data2["information_id"] = $post_id;
        goto I_Tih;
        zggbl:
        global $_GPC, $_W;
        goto mPk5b;
        MvU_W:
        $data["hong"] = $hong;
        goto x4gjU;
        U4AcO:
        LWUW7:
        goto le9gD;
        jFhmo:
        if ($res) {
            goto Z2zsy;
        }
        goto lMVMA;
        Yyt8n:
        goto xBApr;
        goto nfck1;
        nfck1:
        kDdAS:
        goto KYAza;
        taS1J:
        $data["img"] = $_GPC["img"];
        goto pr7Tp;
        x4gjU:
        cNcgw:
        goto q43_f;
        St3tz:
        $data["time"] = time();
        goto as1g2;
        IFeDV:
        j5V_U:
        goto lmi7f;
        lFf62:
        $data["user_tel"] = $_GPC["user_tel"];
        goto ZRJWb;
        I_Tih:
        $res2 = pdo_insert("ymktv_sun_mylabel", $data2);
        goto sbJ_h;
        lMVMA:
        echo "2";
        goto QlCG4;
        XTvQF:
        $data["hb_num"] = $_GPC["hb_num"];
        goto Bmo5s;
        AlAH0:
        $data["cityname"] = $_GPC["cityname"];
        goto I7ADX;
        I7ADX:
        if ($_GPC["type"]) {
            goto gthos;
        }
        goto xdo5j;
        cyFR1:
        Z2zsy:
        goto zOm_s;
        RSPq1:
        if ($system["tz_audit"] == 2) {
            goto kDdAS;
        }
        goto GWCn_;
        p_eki:
        $data["state"] = 2;
        goto LVN7W;
        QV5Nk:
        if (!($_GPC["hb_random"] == 1)) {
            goto cNcgw;
        }
        goto b_g5V;
        F_gf0:
        $a = json_decode(html_entity_decode($_GPC["sz"]));
        goto ucGMp;
        Xp4YN:
        $post_id = pdo_insertid();
        goto F_gf0;
        Y_X6p:
        $data["hb_money"] = $_GPC["hb_money"];
        goto XTvQF;
        srLYH:
        Ci12u:
        goto lkP3p;
        QlCG4:
        goto LWUW7;
        goto cyFR1;
        zOm_s:
        $i = 0;
        goto srLYH;
        GWCn_:
        $data["state"] = 1;
        goto Yyt8n;
        PhR_i:
        $data["user_name"] = $_GPC["user_name"];
        goto lFf62;
        pOH5t:
        $tz_id = pdo_insertid();
        goto Xp4YN;
        wntgX:
        $data["top_type"] = $_GPC["type"];
        goto H8FZD;
        xdo5j:
        $data["top"] = 2;
        goto ChTwa;
        JXpea:
        $data["hb_random"] = $_GPC["hb_random"];
        goto QV5Nk;
        pr7Tp:
        $data["user_id"] = $_GPC["user_id"];
        goto PhR_i;
        j0vJZ:
        $data["details"] = $_GPC["details"];
        goto taS1J;
        as1g2:
        $data["uniacid"] = $_W["uniacid"];
        goto RSPq1;
        A1o9w:
        gthos:
        goto B9Bpo;
        GQLN2:
        LeNgM:
        goto St3tz;
        Bmo5s:
        $data["hb_type"] = $_GPC["hb_type"];
        goto MIyMC;
        ucGMp:
        $sz = json_decode(json_encode($a), true);
        goto jFhmo;
        q43_f:
        $res = pdo_insert("ymktv_sun_information", $data);
        goto pOH5t;
        b_g5V:
        function sendRandBonus($total = 0, $count = 3)
        {
            goto wCGkw;
            kCseg:
            $last = 0;
            goto GjBMK;
            Sud_9:
            if (!($count > 1)) {
                goto yomn0;
            }
            goto d6J2U;
            GjBMK:
            foreach ($rand_keys as $i => $key) {
                goto YjTdI;
                QJnpA:
                R5mPG:
                goto SyP7n;
                YjTdI:
                $current = $input[$key] - $last;
                goto DdOKG;
                dh5dn:
                $last = $input[$key];
                goto QJnpA;
                DdOKG:
                $items[] = $current;
                goto dh5dn;
                SyP7n:
            }
            goto owgiy;
            wCGkw:
            $input = range(0.01, $total, 0.01);
            goto Sud_9;
            owgiy:
            Evm3l:
            goto mUy16;
            cwQNH:
            return $items;
            goto Yg5PZ;
            d6J2U:
            $rand_keys = (array) array_rand($input, $count - 1);
            goto kCseg;
            fz7DX:
            $items[] = $total - array_sum($items);
            goto cwQNH;
            mUy16:
            yomn0:
            goto fz7DX;
            Yg5PZ:
        }
        goto gPvd0;
        IcWV_:
        $data["type_id"] = $_GPC["type_id"];
        goto Srfud;
        ZRJWb:
        $data["type2_id"] = $_GPC["type2_id"];
        goto IcWV_;
        Srfud:
        $data["money"] = $_GPC["money"];
        goto wntgX;
        HMNuD:
        $data2["label_id"] = $sz[$i]["label_id"];
        goto dnrue;
        X3z7X:
        $i++;
        goto zlPbk;
        lkP3p:
        if (!($i < count($sz))) {
            goto j5V_U;
        }
        goto HMNuD;
        WAgOe:
        $data["store_id"] = $_GPC["store_id"];
        goto AlAH0;
        KYAza:
        $data["sh_time"] = time();
        goto p_eki;
        B9Bpo:
        $data["top"] = 1;
        goto GQLN2;
        zlPbk:
        goto Ci12u;
        goto IFeDV;
        ChTwa:
        goto LeNgM;
        goto A1o9w;
        mPk5b:
        $system = pdo_get("ymktv_sun_system", array("uniacid" => $_W["uniacid"]));
        goto j0vJZ;
        MIyMC:
        $data["hb_keyword"] = $_GPC["hb_keyword"];
        goto JXpea;
        sbJ_h:
        LCxmK:
        goto X3z7X;
        gPvd0:
        $hong = json_encode(sendRandBonus($_GPC["hb_money"], $_GPC["hb_num"]));
        goto MvU_W;
        lmi7f:
        echo $tz_id;
        goto U4AcO;
        H8FZD:
        $data["address"] = $_GPC["address"];
        goto WAgOe;
        LVN7W:
        xBApr:
        goto Y_X6p;
        le9gD:
    }
    public function doPageUpdPost()
    {
        goto EKUjP;
        UFZfR:
        dy5xX:
        goto WeeCO;
        Aa2oE:
        goto zEm3Q;
        goto UFZfR;
        fDm3Z:
        $data["state"] = 2;
        goto g3Z0L;
        ycWp5:
        $i++;
        goto mMR_1;
        eFutJ:
        $data["type_id"] = $_GPC["type_id"];
        goto u6rQO;
        lqgeA:
        $a = json_decode(html_entity_decode($_GPC["sz"]));
        goto Sav6L;
        WeeCO:
        $data["sh_time"] = time();
        goto fDm3Z;
        OikKV:
        rvmr6:
        goto OgnJ4;
        xWy63:
        $data["user_tel"] = $_GPC["user_tel"];
        goto s1LtP;
        bxcVR:
        Pf0dG:
        goto vLYgR;
        m2Pe7:
        $data["time"] = time();
        goto uFsrB;
        s1LtP:
        $data["type2_id"] = $_GPC["type2_id"];
        goto eFutJ;
        bajbJ:
        goto NS_Qt;
        goto JygUI;
        tkW0x:
        $data["img"] = $_GPC["img"];
        goto dJsSe;
        vLYgR:
        if (!($i < count($sz))) {
            goto L2EnH;
        }
        goto ib9Ke;
        Sav6L:
        $sz = json_decode(json_encode($a), true);
        goto cpZv1;
        cmO_n:
        $res = pdo_update("ymktv_sun_information", $data, array("id" => $_GPC["id"]));
        goto g6Bxh;
        U_mtn:
        if (!$_GPC["top_type"]) {
            goto rvmr6;
        }
        goto CfdMK;
        cpZv1:
        if ($res) {
            goto tflY4;
        }
        goto a1m12;
        g6Bxh:
        pdo_delete("ymktv_sun_mylabel", array("information_id" => $_GPC["id"]));
        goto lqgeA;
        tGZM_:
        L2EnH:
        goto gwG6P;
        dJsSe:
        $data["user_id"] = $_GPC["user_id"];
        goto IdLzw;
        LOV1T:
        $data2["information_id"] = $post_id;
        goto ZL0Mr;
        ZL0Mr:
        $res2 = pdo_insert("ymktv_sun_mylabel", $data2);
        goto pkmB_;
        gwG6P:
        echo "1";
        goto J9_6b;
        pkmB_:
        AKb7j:
        goto ycWp5;
        IdLzw:
        $data["user_name"] = $_GPC["user_name"];
        goto xWy63;
        u6rQO:
        $data["money"] = $_GPC["money"];
        goto GlUAw;
        mMR_1:
        goto Pf0dG;
        goto tGZM_;
        uFsrB:
        $data["uniacid"] = $_W["uniacid"];
        goto zpI4_;
        GlUAw:
        $data["address"] = $_GPC["address"];
        goto R0m2x;
        kgI5d:
        $system = pdo_get("ymktv_sun_system", array("uniacid" => $_W["uniacid"]));
        goto LzQDb;
        ib9Ke:
        $data2["label_id"] = $sz[$i]["label_id"];
        goto LOV1T;
        Nxy82:
        $data["state"] = 1;
        goto Aa2oE;
        LzQDb:
        $data["details"] = $_GPC["details"];
        goto tkW0x;
        EKUjP:
        global $_GPC, $_W;
        goto kgI5d;
        zpI4_:
        if ($system["tz_audit"] == 2) {
            goto dy5xX;
        }
        goto Nxy82;
        CfdMK:
        $data["top"] = 1;
        goto OikKV;
        JygUI:
        tflY4:
        goto wup_E;
        OgnJ4:
        $data["cityname"] = $_GPC["cityname"];
        goto m2Pe7;
        vbxN3:
        $data["top_type"] = $_GPC["top_type"];
        goto U_mtn;
        J9_6b:
        NS_Qt:
        goto wOV7w;
        a1m12:
        echo "2";
        goto bajbJ;
        wup_E:
        $i = 0;
        goto bxcVR;
        R0m2x:
        $data["store_id"] = $_GPC["store_id"];
        goto vbxN3;
        g3Z0L:
        zEm3Q:
        goto cmO_n;
        wOV7w:
    }
    public function doPageDelPost()
    {
        goto El1u2;
        El1u2:
        global $_GPC, $_W;
        goto hCt7V;
        gsvJn:
        N2ClD:
        goto nLCw7;
        siTID:
        goto HxwmC;
        goto gsvJn;
        hCt7V:
        $res = pdo_update("ymktv_sun_information", array("del" => 1), array("id" => $_GPC["id"]));
        goto y4R3Z;
        tsiv4:
        echo "2";
        goto siTID;
        y4R3Z:
        if ($res) {
            goto N2ClD;
        }
        goto tsiv4;
        nLCw7:
        echo "1";
        goto FUUKU;
        FUUKU:
        HxwmC:
        goto kxte1;
        kxte1:
    }
    public function doPageLike()
    {
        goto mC9Ou;
        M_zxd:
        pdo_update("ymktv_sun_information", array("givelike +=" => 1), array("id" => $_GPC["information_id"]));
        goto o9uBj;
        U0scz:
        $data["user_id"] = $_GPC["user_id"];
        goto Vc_yk;
        j1gf7:
        echo "不能重复点赞!";
        goto KYBcm;
        o9uBj:
        echo "1";
        goto G5e86;
        G5e86:
        goto saaRx;
        goto oiiuM;
        UbNUl:
        pdo_insert("ymktv_sun_like", $data);
        goto M_zxd;
        KGqZw:
        $data["information_id"] = $_GPC["information_id"];
        goto U0scz;
        KYBcm:
        saaRx:
        goto hWK79;
        Vc_yk:
        $res = pdo_get("ymktv_sun_like", $data);
        goto j4MTx;
        mC9Ou:
        global $_GPC, $_W;
        goto KGqZw;
        oiiuM:
        KjXGM:
        goto j1gf7;
        j4MTx:
        if ($res) {
            goto KjXGM;
        }
        goto UbNUl;
        hWK79:
    }
    public function doPageZxLike()
    {
        goto YFCRX;
        F4ksS:
        if ($res2) {
            goto ZQk5r;
        }
        goto szJ9o;
        pnhh8:
        echo "不能重复点赞!";
        goto LY4_f;
        Ibx4W:
        echo "1";
        goto VqJIc;
        JDtyS:
        $data["zx_id"] = $_GPC["zx_id"];
        goto CrXSs;
        eN7bP:
        goto fvUWx;
        goto dRCPU;
        qsatn:
        goto hU7k8;
        goto XcQs4;
        e2Mi5:
        $res2 = pdo_insert("ymktv_sun_like", $data);
        goto F4ksS;
        VqJIc:
        fvUWx:
        goto qsatn;
        LY4_f:
        hU7k8:
        goto RtjrP;
        L0Jvk:
        if ($res) {
            goto OsS7Q;
        }
        goto e2Mi5;
        dRCPU:
        ZQk5r:
        goto Ibx4W;
        y3M5q:
        $res = pdo_get("ymktv_sun_like", $data);
        goto L0Jvk;
        YFCRX:
        global $_GPC, $_W;
        goto JDtyS;
        XcQs4:
        OsS7Q:
        goto pnhh8;
        CrXSs:
        $data["user_id"] = $_GPC["user_id"];
        goto y3M5q;
        szJ9o:
        echo "2";
        goto eN7bP;
        RtjrP:
    }
    public function doPageZxLikeImg()
    {
        goto zbSAu;
        zbSAu:
        global $_GPC, $_W;
        goto wTKiH;
        Jz9wZ:
        $zxImg = pdo_fetchall($sql);
        goto ebojP;
        wTKiH:
        $zxid = $_GPC["zxid"];
        goto JB1sG;
        JB1sG:
        $sql = "SELECT * FROM " . tablename("ymktv_sun_like") . " l " . " JOIN " . tablename("ymktv_sun_user") . " u " . " ON " . "l.user_id=u.id" . " WHERE " . "l.zx_id=" . $zxid . " LIMIT 0, 5";
        goto Jz9wZ;
        ebojP:
        echo json_encode($zxImg);
        goto TL6_q;
        TL6_q:
    }
    public function doPageZxLikeLength()
    {
        goto iqWBu;
        EaxNc:
        echo json_encode($length);
        goto vjaxi;
        iqWBu:
        global $_GPC, $_W;
        goto W2MsI;
        PajEe:
        $length = pdo_getall("ymktv_sun_like", array("zx_id" => $zxid));
        goto EaxNc;
        W2MsI:
        $zxid = $_GPC["zxid"];
        goto PajEe;
        vjaxi:
    }
    public function doPageZxLikeList()
    {
        goto uGr2d;
        yFZ1H:
        $res = pdo_fetchall($sql, array(":zx_id" => $_GPC["zx_id"]));
        goto zZJ2Q;
        zZJ2Q:
        echo json_encode($res);
        goto IRGKr;
        uGr2d:
        global $_GPC, $_W;
        goto pcLL7;
        pcLL7:
        $sql = "select a.*,b.img as user_img ,b.name as user_name from " . tablename("ymktv_sun_like") . " a" . " left join " . tablename("ymktv_sun_user") . " b on b.id=a.user_id  WHERE a.zx_id=:zx_id  ORDER BY a.id DESC";
        goto yFZ1H;
        IRGKr:
    }
    public function doPageMyPost()
    {
        goto JggXq;
        cwMcy:
        $res = pdo_fetchall($select_sql, array(":user_id" => $_GPC["user_id"]));
        goto XIa3c;
        SwEDk:
        $select_sql = $sql . " LIMIT " . ($pageindex - 1) * $pagesize . "," . $pagesize;
        goto cwMcy;
        XIa3c:
        echo json_encode($res);
        goto NLfQg;
        GL1Vs:
        $pageindex = max(1, intval($_GPC["page"]));
        goto n1Tkn;
        n4m53:
        $sql = "select a.*,b.type_name,c.name as type2_name from " . tablename("ymktv_sun_information") . " a" . " left join " . tablename("ymktv_sun_type") . " b on b.id=a.type_id  " . " left join " . tablename("ymktv_sun_type2") . " c on a.type2_id=c.id   WHERE a.user_id=:user_id and a.del=2 ORDER BY a.id DESC";
        goto SwEDk;
        n1Tkn:
        $pagesize = 10;
        goto n4m53;
        JggXq:
        global $_GPC, $_W;
        goto GL1Vs;
        NLfQg:
    }
    public function doPageStorePost()
    {
        goto vO5zj;
        vO5zj:
        global $_GPC, $_W;
        goto lxaln;
        AlbbN:
        echo json_encode($res);
        goto X07e8;
        lxaln:
        $res = pdo_getall("ymktv_sun_information", array("store_id" => $_GPC["store_id"], "del" => 2));
        goto AlbbN;
        X07e8:
    }
    public function doPageStorePostList()
    {
        goto DeGA6;
        UXcSI:
        $sql = "select a.*,b.logo from " . tablename("ymktv_sun_information") . " a" . " left join " . tablename("ymktv_sun_store") . " b on b.id=a.store_id  WHERE a.uniacid=:uniacid and a.store_id!='' and a.del=2 ORDER BY a.id DESC";
        goto mna90;
        Pf3Km:
        echo json_encode($res);
        goto VCvQb;
        mna90:
        $res = pdo_fetchall($sql, array(":uniacid" => $_W["uniacid"]));
        goto Pf3Km;
        DeGA6:
        global $_GPC, $_W;
        goto UXcSI;
        VCvQb:
    }
    public function doPagePostInfo()
    {
        goto FBEmg;
        b_7C7:
        $res4 = pdo_fetchall($sql4, array(":id" => $_GPC["id"]));
        goto nikb1;
        gGbwT:
        pdo_update("ymktv_sun_information", array("views +=" => 1), array("id" => $_GPC["id"]));
        goto OPV03;
        FBEmg:
        global $_GPC, $_W;
        goto gGbwT;
        qkHg4:
        $res2 = pdo_fetchall($sql2, array(":id" => $_GPC["id"]));
        goto mxH7W;
        mxH7W:
        $sql3 = "select a.*,b.img as user_img,b.name from " . tablename("ymktv_sun_comments") . " a" . " left join " . tablename("ymktv_sun_user") . " b on b.id=a.user_id  WHERE a.information_id=:id  ORDER BY a.id DESC";
        goto Vd0GP;
        BM_C5:
        $data["dz"] = $res2;
        goto v6PDl;
        v0Cr2:
        $sql2 = "select a.*,b.img as user_img from " . tablename("ymktv_sun_like") . " a" . " left join " . tablename("ymktv_sun_user") . " b on b.id=a.user_id  WHERE a.information_id=:id  ORDER BY a.id DESC";
        goto qkHg4;
        v6PDl:
        $data["pl"] = $res3;
        goto LhYc8;
        axTdC:
        $sql4 = "select a.*,b.label_name from " . tablename("ymktv_sun_mylabel") . " a" . " left join " . tablename("ymktv_sun_label") . " b on b.id=a.label_id  WHERE a.information_id=:id  ORDER BY a.id DESC";
        goto b_7C7;
        fYe9e:
        $res = pdo_fetch($sql, array(":id" => $_GPC["id"]));
        goto v0Cr2;
        nikb1:
        $data["tz"] = $res;
        goto BM_C5;
        OPV03:
        $sql = "select a.*,b.type_name,c.name as type2_name,d.img as user_img,e.logo,e.coordinates from " . tablename("ymktv_sun_information") . " a" . " left join " . tablename("ymktv_sun_type") . " b on b.id=a.type_id  " . " left join " . tablename("ymktv_sun_type2") . " c on a.type2_id=c.id " . " left join " . tablename("ymktv_sun_user") . " d on a.user_id=d.id" . " left join " . tablename("ymktv_sun_store") . " e on a.store_id=e.id  WHERE a.id=:id  ORDER BY a.id DESC";
        goto fYe9e;
        LhYc8:
        $data["label"] = $res4;
        goto PHnFO;
        Vd0GP:
        $res3 = pdo_fetchall($sql3, array(":id" => $_GPC["id"]));
        goto axTdC;
        PHnFO:
        echo json_encode($data);
        goto J1PvT;
        J1PvT:
    }
    public function doPagePostList()
    {
        goto D4x9W;
        ot0BQ:
        $i = 0;
        goto bM00i;
        UPe_f:
        BHzb4:
        goto HW0xK;
        RSjpw:
        gwBAs:
        goto EW1Nk;
        mk6q5:
        $pageindex = max(1, intval($_GPC["page"]));
        goto KjHft;
        BfwvU:
        $j++;
        goto q3IVx;
        qXQCQ:
        pdo_update("ymktv_sun_information", array("dq_time" => $list[$j]["sh_time"] + 24 * 60 * 60 * 60), array("id" => $list[$j]["id"]));
        goto zB0JV;
        DnOag:
        hUQMV:
        goto a3pnN;
        YS3Qw:
        if ($list[$j]["top_type"] == 1) {
            goto pmIK8;
        }
        goto gFDIT;
        KKzB4:
        $data[":name"] = $_GPC["cityname"];
        goto FBVh0;
        b33NH:
        $j = 0;
        goto Yfw6F;
        OjUwY:
        $data2 = array();
        goto ot0BQ;
        a3AOG:
        $time2 = time() - 24 * 7 * 60 * 60;
        goto MZtaL;
        Oja3W:
        $data[] = array("label_name" => $res2[$k]["label_name"]);
        goto UPe_f;
        Cj2Iv:
        $time = time() - 24 * 60 * 60;
        goto a3AOG;
        CR_vT:
        goto FU3lQ;
        goto RSjpw;
        a3pnN:
        $where = " WHERE a.type2_id=:type2_id and a.state=:state and a.del=2";
        goto X6yf4;
        KjHft:
        $pagesize = 10;
        goto Go9Cb;
        Bx3EH:
        goto E26JV;
        goto W7DGr;
        W7DGr:
        pmIK8:
        goto j1KaZ;
        i3zF0:
        N2nmH:
        goto wP77C;
        bM00i:
        FU3lQ:
        goto Fsct2;
        D4x9W:
        global $_GPC, $_W;
        goto Cj2Iv;
        q3IVx:
        goto bGGn6;
        goto DnOag;
        h9tLO:
        d3D7F:
        goto tkbxx;
        wP77C:
        $i++;
        goto CR_vT;
        nANcU:
        J5cYf:
        goto BfwvU;
        C_MwN:
        $k++;
        goto ibXzA;
        Go9Cb:
        $sql = "select a.*,b.img as user_img,c.logo from " . tablename("ymktv_sun_information") . " a" . " left join " . tablename("ymktv_sun_user") . " b on b.id=a.user_id" . " left join " . tablename("ymktv_sun_store") . " c on c.id=a.store_id" . $where . " ORDER BY a.top asc,a.id DESC";
        goto ryxm1;
        pKQ0M:
        if (!$_GPC["cityname"]) {
            goto kIysA;
        }
        goto xJy4S;
        gFDIT:
        if ($list[$j]["top_type"] == 2) {
            goto QLnqk;
        }
        goto CFLcS;
        zB0JV:
        E26JV:
        goto nANcU;
        xJy4S:
        $where .= " and a.cityname LIKE  concat('%', :name,'%') ";
        goto KKzB4;
        qador:
        goto E26JV;
        goto NXHOo;
        EW1Nk:
        echo json_encode($data2);
        goto dTOaT;
        arpkf:
        $res2 = pdo_fetchall($sql2);
        goto OjUwY;
        WqzjZ:
        $k = 0;
        goto h9tLO;
        cPYxl:
        $sql2 = "select a.*,b.label_name from " . tablename("ymktv_sun_mylabel") . " a" . " left join " . tablename("ymktv_sun_label") . " b on b.id=a.label_id";
        goto arpkf;
        j1KaZ:
        pdo_update("ymktv_sun_information", array("dq_time" => $list[$j]["sh_time"] + 24 * 60 * 60), array("id" => $list[$j]["id"]));
        goto GJCn9;
        Gh5dS:
        pdo_update("ymktv_sun_information", array("dq_time" => $list[$j]["sh_time"] + 24 * 60 * 60 * 7), array("id" => $list[$j]["id"]));
        goto qador;
        ryxm1:
        $select_sql = $sql . " LIMIT " . ($pageindex - 1) * $pagesize . "," . $pagesize;
        goto Nb5WS;
        Y0OUU:
        pdo_update("ymktv_sun_information", array("top" => 2), array("sh_time <=" => $time2, "top_type" => 2, "state" => 2));
        goto DQsDq;
        tkbxx:
        if (!($k < count($res2))) {
            goto c6L15;
        }
        goto FHQgW;
        GJCn9:
        goto E26JV;
        goto v6N13;
        Fsct2:
        if (!($i < count($res))) {
            goto gwBAs;
        }
        goto KMkLK;
        MZtaL:
        $time3 = time() - 24 * 30 * 60 * 60;
        goto mete5;
        IqhGo:
        if (!($j < count($list))) {
            goto hUQMV;
        }
        goto YS3Qw;
        uZjwt:
        c6L15:
        goto yEg3A;
        X6yf4:
        $data[":type2_id"] = $_GPC["type2_id"];
        goto yYO9y;
        NXHOo:
        pHbb_:
        goto qXQCQ;
        v6N13:
        QLnqk:
        goto Gh5dS;
        da1oc:
        $list = pdo_getall("ymktv_sun_information", array("uniacid" => $_W["uniacid"], "state" => 2));
        goto b33NH;
        FBVh0:
        kIysA:
        goto mk6q5;
        mete5:
        pdo_update("ymktv_sun_information", array("top" => 2), array("sh_time <=" => $time, "top_type" => 1, "state" => 2));
        goto Y0OUU;
        Nb5WS:
        $res = pdo_fetchall($select_sql, $data);
        goto cPYxl;
        yEg3A:
        $data2[] = array("tz" => $res[$i], "label" => $data);
        goto i3zF0;
        FHQgW:
        if (!($res[$i]["id"] == $res2[$k]["information_id"])) {
            goto BHzb4;
        }
        goto Oja3W;
        CFLcS:
        if ($list[$j]["top_type"] == 3) {
            goto pHbb_;
        }
        goto Bx3EH;
        ibXzA:
        goto d3D7F;
        goto uZjwt;
        Yfw6F:
        bGGn6:
        goto IqhGo;
        KMkLK:
        $data = array();
        goto WqzjZ;
        DQsDq:
        pdo_update("ymktv_sun_information", array("top" => 2), array("sh_time <=" => $time3, "top_type" => 3, "state" => 2));
        goto da1oc;
        yYO9y:
        $data[":state"] = 2;
        goto pKQ0M;
        HW0xK:
        CSVee:
        goto C_MwN;
        dTOaT:
    }
    public function doPageList()
    {
        goto Jhish;
        FEujF:
        $res2 = pdo_fetchall($sql2);
        goto y8ZoA;
        cQdmX:
        pdo_update("ymktv_sun_information", array("dq_time" => $list[$j]["sh_time"] + 24 * 60 * 60 * 7), array("id" => $list[$j]["id"]));
        goto HLiuY;
        tWRgR:
        pdo_update("ymktv_sun_information", array("dq_time" => $list[$j]["sh_time"] + 24 * 60 * 60 * 60), array("id" => $list[$j]["id"]));
        goto JsymR;
        OnXKn:
        xJiwQ:
        goto cVAp0;
        qFKz3:
        if (!($i < count($res))) {
            goto yeLIe;
        }
        goto aW0UC;
        a_X6M:
        rC28y:
        goto l8XQp;
        nM9rH:
        xooqn:
        goto tWRgR;
        aW0UC:
        $data = array();
        goto TADaD;
        TafqK:
        if (!$_GPC["cityname"]) {
            goto xJiwQ;
        }
        goto dmThk;
        e3Dxc:
        yeLIe:
        goto BK0ba;
        Qp0ZY:
        $list = pdo_getall("ymktv_sun_information", array("uniacid" => $_W["uniacid"], "state" => 2));
        goto x0AkG;
        fKRCO:
        $time2 = time() - 24 * 7 * 60 * 60;
        goto ZEQ97;
        nu5XA:
        $data[":state"] = 2;
        goto TafqK;
        qwFG4:
        $time = time() - 24 * 60 * 60;
        goto fKRCO;
        HJ_TO:
        $pageindex = max(1, intval($_GPC["page"]));
        goto lgoLQ;
        xBmhV:
        goto rC28y;
        goto p9v5F;
        rU97A:
        $where = " where a.type_id=:type_id and a.state=:state and a.del=2 ";
        goto Qp0ZY;
        O2_RO:
        yD6IX:
        goto cQdmX;
        sm3_j:
        hAUUD:
        goto bzx_Q;
        atTNI:
        if (!($res[$i]["id"] == $res2[$k]["information_id"])) {
            goto RaNHz;
        }
        goto gw5zl;
        JsymR:
        TqEtF:
        goto PcY5q;
        dmThk:
        $where .= " and a.cityname LIKE  concat('%', :name,'%') ";
        goto YyFqn;
        TXgwb:
        goto mDvJn;
        goto irXtJ;
        ZEQ97:
        $time3 = time() - 24 * 30 * 60 * 60;
        goto HJ_TO;
        jlzt5:
        if ($list[$j]["top_type"] == 1) {
            goto pK3jh;
        }
        goto AfLbt;
        lgoLQ:
        $pagesize = 10;
        goto XSVa2;
        lUcmu:
        goto pne5B;
        goto e3Dxc;
        x0AkG:
        $j = 0;
        goto IRIH4;
        YqTyB:
        $select_sql = $sql . " LIMIT " . ($pageindex - 1) * $pagesize . "," . $pagesize;
        goto d2fdA;
        syOFy:
        goto TqEtF;
        goto adkis;
        xPJe0:
        goto TqEtF;
        goto O2_RO;
        l8XQp:
        if (!($k < count($res2))) {
            goto UU1uE;
        }
        goto atTNI;
        Qi0gG:
        $data[":type_id"] = $_GPC["type_id"];
        goto nu5XA;
        vIeFQ:
        lZnR8:
        goto Q8OFJ;
        YyFqn:
        $data[":name"] = $_GPC["cityname"];
        goto OnXKn;
        gw5zl:
        $data[] = array("label_name" => $res2[$k]["label_name"]);
        goto gzPpd;
        bzx_Q:
        $k++;
        goto xBmhV;
        UjLwh:
        $i = 0;
        goto wFkGn;
        XSVa2:
        pdo_update("ymktv_sun_information", array("top" => 2), array("sh_time <=" => $time, "top_type" => 1, "state" => 2));
        goto VuhKr;
        KFpfg:
        $sql2 = "select a.*,b.label_name from " . tablename("ymktv_sun_mylabel") . " a" . " left join " . tablename("ymktv_sun_label") . " b on b.id=a.label_id";
        goto FEujF;
        Jhish:
        global $_GPC, $_W;
        goto qwFG4;
        BK0ba:
        echo json_encode($data2);
        goto xHDQh;
        Ebyee:
        if (!($j < count($list))) {
            goto miapz;
        }
        goto jlzt5;
        irXtJ:
        miapz:
        goto Qi0gG;
        cVAp0:
        $sql = "select a.*,b.img as user_img,c.logo from " . tablename("ymktv_sun_information") . " a" . " left join " . tablename("ymktv_sun_user") . " b on b.id=a.user_id" . " left join " . tablename("ymktv_sun_store") . " c on c.id=a.store_id" . $where . " ORDER BY a.top asc,a.id DESC";
        goto YqTyB;
        d2fdA:
        $res = pdo_fetchall($select_sql, $data);
        goto KFpfg;
        Ymok7:
        $data2[] = array("tz" => $res[$i], "label" => $data);
        goto vIeFQ;
        rJQ8x:
        $j++;
        goto TXgwb;
        P_4Iu:
        pdo_update("ymktv_sun_information", array("dq_time" => $list[$j]["sh_time"] + 24 * 60 * 60), array("id" => $list[$j]["id"]));
        goto xPJe0;
        wFkGn:
        pne5B:
        goto qFKz3;
        VuhKr:
        pdo_update("ymktv_sun_information", array("top" => 2), array("sh_time <=" => $time2, "top_type" => 2, "state" => 2));
        goto jCj_K;
        gzPpd:
        RaNHz:
        goto sm3_j;
        oN1d4:
        if ($list[$j]["top_type"] == 3) {
            goto xooqn;
        }
        goto syOFy;
        jCj_K:
        pdo_update("ymktv_sun_information", array("top" => 2), array("sh_time <=" => $time3, "top_type" => 3, "state" => 2));
        goto rU97A;
        HLiuY:
        goto TqEtF;
        goto nM9rH;
        y8ZoA:
        $data2 = array();
        goto UjLwh;
        IRIH4:
        mDvJn:
        goto Ebyee;
        p9v5F:
        UU1uE:
        goto Ymok7;
        PcY5q:
        ZrVP6:
        goto rJQ8x;
        TADaD:
        $k = 0;
        goto a_X6M;
        adkis:
        pK3jh:
        goto P_4Iu;
        AfLbt:
        if ($list[$j]["top_type"] == 2) {
            goto yD6IX;
        }
        goto oN1d4;
        Q8OFJ:
        $i++;
        goto lUcmu;
        xHDQh:
    }
    public function doPageList2()
    {
        goto cf0tM;
        wxlqt:
        $pagesize = 10;
        goto DlqLQ;
        YMD3d:
        $time2 = time() - 24 * 7 * 60 * 60;
        goto myxOV;
        VeHV2:
        ZXbcV:
        goto ZvcHM;
        YISjO:
        $data[":name"] = $_GPC["cityname"];
        goto VeHV2;
        Iua79:
        $data[":uniacid"] = $_W["uniacid"];
        goto JkW8Z;
        S4O31:
        $res2 = pdo_fetchall($sql2);
        goto vh6Fm;
        b2Ts7:
        pdo_update("ymktv_sun_information", array("dq_time" => $list[$j]["sh_time"] + 24 * 60 * 60 * 7), array("id" => $list[$j]["id"]));
        goto weO9m;
        DXWv2:
        goto AVBUS;
        goto ArB90;
        VUseg:
        OFWe9:
        goto SR84D;
        GBGi6:
        if ($list[$j]["top_type"] == 2) {
            goto sZaQ4;
        }
        goto wtrbA;
        ATRoa:
        $i++;
        goto XwESa;
        wpkqA:
        if (!$_GPC["cityname"]) {
            goto ZXbcV;
        }
        goto g_hrZ;
        SSL3V:
        pdo_update("ymktv_sun_information", array("top" => 2), array("sh_time <=" => $time3, "top_type" => 3, "state" => 2));
        goto ZwNIp;
        TULD2:
        VfEUx:
        goto zwi3D;
        ZvcHM:
        $pageindex = max(1, intval($_GPC["page"]));
        goto wxlqt;
        qfboV:
        goto AVBUS;
        goto ImvN0;
        wtrbA:
        if ($list[$j]["top_type"] == 3) {
            goto DBjHN;
        }
        goto qfboV;
        L6YZV:
        if (!($k < count($res2))) {
            goto Be2hb;
        }
        goto KpLvN;
        QVnKX:
        AVBUS:
        goto zt6A9;
        mozxO:
        IrBse:
        goto rxxWZ;
        myxOV:
        $time3 = time() - 24 * 30 * 60 * 60;
        goto u0rRP;
        r5VtX:
        if (!$_GPC["type_id"]) {
            goto nFUf0;
        }
        goto TvXzm;
        u0rRP:
        pdo_update("ymktv_sun_information", array("top" => 2), array("sh_time <=" => $time, "top_type" => 1, "state" => 2));
        goto iX5FB;
        zwi3D:
        if (!($j < count($list))) {
            goto lwXRi;
        }
        goto rI43s;
        Eie35:
        DBjHN:
        goto yY7r3;
        ArB90:
        sZaQ4:
        goto b2Ts7;
        zHOMZ:
        $j++;
        goto Xb9P0;
        Z0bB6:
        nFUf0:
        goto wpkqA;
        weO9m:
        goto AVBUS;
        goto Eie35;
        ytZc2:
        wUh3H:
        goto T7LrO;
        DlqLQ:
        $sql = "select a.*,b.img as user_img,c.type_name,d.name as type2_name  from" . tablename("ymktv_sun_information") . " a" . " left join " . tablename("ymktv_sun_user") . " b on b.id=a.user_id " . " left join " . tablename("ymktv_sun_type") . " c on a.type_id=c.id " . " left join " . tablename("ymktv_sun_type2") . " d on a.type2_id=d.id " . $where . " ORDER BY a.top asc,a.id DESC";
        goto Wb6kH;
        vds9b:
        goto MeK2S;
        goto dGnFE;
        TvXzm:
        $where .= " and  a.type_id=:type_id ";
        goto ys1wF;
        hcZrs:
        $j = 0;
        goto TULD2;
        SR84D:
        YrRvH:
        goto icmvR;
        iX5FB:
        pdo_update("ymktv_sun_information", array("top" => 2), array("sh_time <=" => $time2, "top_type" => 2, "state" => 2));
        goto SSL3V;
        ImvN0:
        B6ev7:
        goto nTDBX;
        vh6Fm:
        $data2 = array();
        goto WFwWZ;
        lzWHm:
        $data = array();
        goto yvXI7;
        yvXI7:
        $k = 0;
        goto o_TJt;
        C6F5K:
        $where = " WHERE a.state=:state and a.del=2  and a.user_id != 0 and a.uniacid=:uniacid";
        goto YcYvQ;
        lgMOI:
        $data[] = array("label_name" => $res2[$k]["label_name"]);
        goto VUseg;
        WFwWZ:
        $i = 0;
        goto mozxO;
        DhLUY:
        $sql2 = "select a.*,b.label_name from " . tablename("ymktv_sun_mylabel") . " a" . " left join " . tablename("ymktv_sun_label") . " b on b.id=a.label_id";
        goto S4O31;
        XwESa:
        goto IrBse;
        goto ytZc2;
        sWqmx:
        $res = pdo_fetchall($select_sql, $data);
        goto DhLUY;
        Xb9P0:
        goto VfEUx;
        goto XcNMT;
        yY7r3:
        pdo_update("ymktv_sun_information", array("dq_time" => $list[$j]["sh_time"] + 24 * 60 * 60 * 60), array("id" => $list[$j]["id"]));
        goto QVnKX;
        o_TJt:
        MeK2S:
        goto L6YZV;
        ys1wF:
        $data[":type_id"] = $_GPC["type_id"];
        goto Z0bB6;
        CdzF4:
        Uj3FO:
        goto ATRoa;
        KpLvN:
        if (!($res[$i]["id"] == $res2[$k]["information_id"])) {
            goto OFWe9;
        }
        goto lgMOI;
        JkW8Z:
        if (!$_GPC["keywords"]) {
            goto iNhyl;
        }
        goto Qac1E;
        T7LrO:
        echo json_encode($data2);
        goto dLPfv;
        YcYvQ:
        $data[":state"] = 2;
        goto Iua79;
        yUyED:
        iNhyl:
        goto r5VtX;
        dGnFE:
        Be2hb:
        goto lja00;
        ZwNIp:
        $list = pdo_getall("ymktv_sun_information", array("uniacid" => $_W["uniacid"], "state" => 2));
        goto hcZrs;
        zt6A9:
        snMr7:
        goto zHOMZ;
        XcNMT:
        lwXRi:
        goto C6F5K;
        kNtE0:
        $data[":name"] = $_GPC["keywords"];
        goto yUyED;
        Wb6kH:
        $select_sql = $sql . " LIMIT " . ($pageindex - 1) * $pagesize . "," . $pagesize;
        goto sWqmx;
        lja00:
        $data2[] = array("tz" => $res[$i], "label" => $data);
        goto CdzF4;
        Qac1E:
        $where .= " and a.details LIKE  concat('%', :name,'%') ";
        goto kNtE0;
        nTDBX:
        pdo_update("ymktv_sun_information", array("dq_time" => $list[$j]["sh_time"] + 24 * 60 * 60), array("id" => $list[$j]["id"]));
        goto DXWv2;
        rxxWZ:
        if (!($i < count($res))) {
            goto wUh3H;
        }
        goto lzWHm;
        FXgJt:
        $time = time() - 24 * 60 * 60;
        goto YMD3d;
        rI43s:
        if ($list[$j]["top_type"] == 1) {
            goto B6ev7;
        }
        goto GBGi6;
        cf0tM:
        global $_GPC, $_W;
        goto FXgJt;
        icmvR:
        $k++;
        goto vds9b;
        g_hrZ:
        $where .= " and a.cityname LIKE  concat('%', :name,'%') ";
        goto YISjO;
        dLPfv:
    }
    public function doPageLabel()
    {
        goto InAWD;
        utuT4:
        echo json_encode($res);
        goto N9aJW;
        InAWD:
        global $_GPC, $_W;
        goto nHz7w;
        nHz7w:
        $res = pdo_getall("ymktv_sun_label", array("type2_id" => $_GPC["type2_id"]));
        goto utuT4;
        N9aJW:
    }
    public function doPageComments()
    {
        goto NQHFq;
        NQHFq:
        global $_GPC, $_W;
        goto PS0kw;
        PS0kw:
        $data["information_id"] = $_GPC["information_id"];
        goto Rn5DD;
        qQ1ZS:
        $assess_id = pdo_insertid();
        goto E2y64;
        ikuDb:
        $res = pdo_insert("ymktv_sun_comments", $data);
        goto qQ1ZS;
        oECrZ:
        adYvy:
        goto hPrQR;
        E2y64:
        if ($res) {
            goto G__2N;
        }
        goto cX9IO;
        kZNO4:
        G__2N:
        goto ktwEc;
        ho9gc:
        $data["details"] = $_GPC["details"];
        goto tT1b2;
        yVvMh:
        goto adYvy;
        goto kZNO4;
        Rn5DD:
        $data["user_id"] = $_GPC["user_id"];
        goto ho9gc;
        cX9IO:
        echo "error";
        goto yVvMh;
        ktwEc:
        echo $assess_id;
        goto oECrZ;
        tT1b2:
        $data["time"] = time();
        goto ikuDb;
        hPrQR:
    }
    public function doPageStoreComments()
    {
        goto rTnhe;
        LVB23:
        $data["store_id"] = $_GPC["store_id"];
        goto NZeMQ;
        RGzXl:
        WZLLl:
        goto bJwrs;
        KIPpI:
        goto WZLLl;
        goto HNIxn;
        bJwrs:
        pdo_update("ymktv_sun_store", array("score" => $pf), array("id" => $_GPC["store_id"]));
        goto Ut5MN;
        mlxyW:
        $count = pdo_get("ymktv_sun_comments", array("store_id" => $_GPC["store_id"]), array("count(id) as count"));
        goto jdpO7;
        yTfjI:
        $pf = 0;
        goto KIPpI;
        Ut5MN:
        echo $assess_id;
        goto t5CHm;
        DGU9F:
        $assess_id = pdo_insertid();
        goto AG6ho;
        NZeMQ:
        $data["user_id"] = $_GPC["user_id"];
        goto yQRil;
        KwxXV:
        $data["score"] = $_GPC["score"];
        goto w92Yz;
        w92Yz:
        $data["time"] = time();
        goto oTEWy;
        HNIxn:
        F1bcu:
        goto xJwUn;
        t5CHm:
        MULzu:
        goto N1Ihf;
        c0Bdj:
        echo "2";
        goto oBMFU;
        jdpO7:
        if ($total["total"] > 0 and $count["count"] > 0) {
            goto F1bcu;
        }
        goto yTfjI;
        oTEWy:
        $res = pdo_insert("ymktv_sun_comments", $data);
        goto DGU9F;
        yQRil:
        $data["details"] = $_GPC["details"];
        goto KwxXV;
        lCwn_:
        E84sZ:
        goto LWKdO;
        oBMFU:
        goto MULzu;
        goto lCwn_;
        AG6ho:
        if ($res) {
            goto E84sZ;
        }
        goto c0Bdj;
        rTnhe:
        global $_GPC, $_W;
        goto LVB23;
        LWKdO:
        $total = pdo_get("ymktv_sun_comments", array("store_id" => $_GPC["store_id"]), array("sum(score) as total"));
        goto mlxyW;
        xJwUn:
        $pf = $total["total"] / $count["count"];
        goto RGzXl;
        N1Ihf:
    }
    public function doPageReply()
    {
        goto oRC95;
        V3gcu:
        goto U8hRM;
        goto A7HrP;
        GIOHa:
        if ($res) {
            goto Y2Gr3;
        }
        goto fg86h;
        cQFQB:
        $data["hf_time"] = time();
        goto eKd8D;
        fg86h:
        echo "2";
        goto V3gcu;
        PLsVD:
        echo "1";
        goto tIy66;
        A7HrP:
        Y2Gr3:
        goto PLsVD;
        eKd8D:
        $res = pdo_update("ymktv_sun_comments", $data, array("id" => $_GPC["id"]));
        goto GIOHa;
        oRC95:
        global $_GPC, $_W;
        goto nFzdP;
        nFzdP:
        $data["reply"] = $_GPC["reply"];
        goto cQFQB;
        tIy66:
        U8hRM:
        goto vIMNE;
        vIMNE:
    }
    public function doPageViews()
    {
        goto phv6a;
        rfgtz:
        echo $total["num"] + $system["total_num"];
        goto WT6Sa;
        iQr9j:
        $sql = "select sum(views) as num from " . tablename("ymktv_sun_information") . " WHERE uniacid=" . $_W["uniacid"];
        goto B9cBQ;
        mXjKD:
        $system = pdo_get("ymktv_sun_system", array("uniacid" => $_W["uniacid"]));
        goto rfgtz;
        phv6a:
        global $_W, $_GPC;
        goto iQr9j;
        BA1oZ:
        pdo_update("ymktv_sun_system", array("total_num +=" => 1), array("uniacid" => $_W["uniacid"]));
        goto mXjKD;
        B9cBQ:
        $total = pdo_fetch($sql);
        goto BA1oZ;
        WT6Sa:
    }
    public function doPageNum()
    {
        goto pDa8Y;
        o0i59:
        $res = pdo_getall("ymktv_sun_information", array("uniacid" => $_W["uniacid"]));
        goto KLnNE;
        pDa8Y:
        global $_W, $_GPC;
        goto o0i59;
        Eceyo:
        $res2 = pdo_get("ymktv_sun_system", array("uniacid" => $_W["uniacid"]));
        goto l9v8u;
        KLnNE:
        $total = count($res);
        goto Eceyo;
        l9v8u:
        echo count($res) + $res2["tz_num"];
        goto BCKt3;
        BCKt3:
    }
    public function doPageTop()
    {
        goto o1z5n;
        Z3hs0:
        $res = pdo_getall("ymktv_sun_top", array("uniacid" => $_W["uniacid"]), array(), '', "num asc");
        goto L5Swz;
        L5Swz:
        echo json_encode($res);
        goto VTCuK;
        o1z5n:
        global $_W, $_GPC;
        goto Z3hs0;
        VTCuK:
    }
    public function doPagePay()
    {
        goto guXB0;
        ZZrve:
        if (!$_GPC["order_id"]) {
            goto lHIxh;
        }
        goto LcUwa;
        guXB0:
        global $_W, $_GPC;
        goto MvDQx;
        pNU7x:
        $return = $weixinpay->pay();
        goto ldIhD;
        LPOQ2:
        if (empty($total_fee)) {
            goto UBURu;
        }
        goto FrEhR;
        HiyKE:
        lHIxh:
        goto nmDvP;
        aj2Qa:
        $res = pdo_get("ymktv_sun_system", array("uniacid" => $_W["uniacid"]));
        goto koKft;
        N5KfR:
        $mch_id = $res["mchid"];
        goto qr1vu;
        wa8g1:
        $total_fee = floatval(99 * 100);
        goto i0oe0;
        ldIhD:
        echo json_encode($return);
        goto qzW31;
        MvDQx:
        include IA_ROOT . "/addons/ymktv_sun/wxpay.php";
        goto aj2Qa;
        LcUwa:
        pdo_update("ymktv_sun_order", array("out_trade_no" => $out_trade_no), array("id" => $_GPC["order_id"]));
        goto HiyKE;
        JcF3U:
        UBURu:
        goto C269S;
        jGPbg:
        $total_fee = floatval($total_fee * 100);
        goto zeC9N;
        nmDvP:
        $weixinpay = new WeixinPay($appid, $openid, $mch_id, $key, $out_trade_no, $body, $total_fee);
        goto pNU7x;
        NT3_V:
        $openid = $_GPC["openid"];
        goto N5KfR;
        qr1vu:
        $key = $res["wxkey"];
        goto K80aZ;
        FrEhR:
        $body = "订单付款";
        goto jGPbg;
        C6p3f:
        $total_fee = $_GPC["money"];
        goto LPOQ2;
        zeC9N:
        goto qcCOZ;
        goto JcF3U;
        koKft:
        $appid = $res["appid"];
        goto NT3_V;
        K80aZ:
        $out_trade_no = $mch_id . time();
        goto C6p3f;
        i0oe0:
        qcCOZ:
        goto ZZrve;
        C269S:
        $body = "订单付款";
        goto wa8g1;
        qzW31:
    }
    public function doPageStore()
    {
        goto V37c1;
        v8_k5:
        $data["cityname"] = $_GPC["cityname"];
        goto amgAr;
        l89nD:
        fqvfe:
        goto WYoGx;
        Y68c4:
        echo "2";
        goto pkR6W;
        knsCd:
        $data["store_name"] = $_GPC["store_name"];
        goto BvNPX;
        ORh2e:
        $data["end_time"] = $_GPC["end_time"];
        goto xFhSd;
        qe0CN:
        YnhF_:
        goto OrmZU;
        hBmTE:
        $data["type"] = $_GPC["type"];
        goto YG8d9;
        yddrx:
        if (!$_GPC["type"]) {
            goto fqvfe;
        }
        goto hBmTE;
        l573z:
        $data["start_time"] = $_GPC["start_time"];
        goto ORh2e;
        kmJMs:
        HZ2oD:
        goto mgC5V;
        nymKN:
        $data["sfxx"] = $_GPC["sfxx"];
        goto oNgeB;
        amgAr:
        if ($system["sj_audit"] == 2) {
            goto YnhF_;
        }
        goto jp4sf;
        iv7kt:
        $data["jzxy"] = $_GPC["jzxy"];
        goto X6aOd;
        Uz2wg:
        $data["skzf"] = $_GPC["skzf"];
        goto jRuId;
        lhNK9:
        $data["area_id"] = $_GPC["area_id"];
        goto l573z;
        tGWMK:
        $data["end_time"] = $_GPC["end_time"];
        goto v8_k5;
        V37c1:
        global $_W, $_GPC;
        goto FzuvS;
        oNgeB:
        $data["tel"] = $_GPC["tel"];
        goto L5qop;
        WYoGx:
        $data["time"] = date("Y-m-d H:i:s", time());
        goto QPaTo;
        L5qop:
        $data["logo"] = $_GPC["logo"];
        goto JoFJp;
        QPaTo:
        $data["money"] = $_GPC["money"];
        goto dfgNV;
        jRuId:
        $data["wifi"] = $_GPC["wifi"];
        goto mDgkJ;
        ZvNh9:
        $data["state"] = 2;
        goto xIT9S;
        hR5RM:
        $data["uniacid"] = $_W["uniacid"];
        goto V1xup;
        JAmCL:
        $data["coordinates"] = $_GPC["coordinates"];
        goto hR5RM;
        j0KWw:
        if ($res) {
            goto HZ2oD;
        }
        goto Y68c4;
        f7DvJ:
        ejs2K:
        goto Q00by;
        OrmZU:
        $data["sh_time"] = time();
        goto ZvNh9;
        m17mg:
        $data["weixin_logo"] = $_GPC["weixin_logo"];
        goto bKwm6;
        dpcVD:
        $data["storetype_id"] = $_GPC["storetype_id"];
        goto EqVSB;
        BvNPX:
        $data["address"] = $_GPC["address"];
        goto y51_D;
        xIT9S:
        sVLaE:
        goto yddrx;
        FzuvS:
        $system = pdo_get("ymktv_sun_system", array("uniacid" => $_W["uniacid"]));
        goto CTysz;
        idmBi:
        goto sVLaE;
        goto qe0CN;
        pkR6W:
        goto ejs2K;
        goto kmJMs;
        mDgkJ:
        $data["mftc"] = $_GPC["mftc"];
        goto iv7kt;
        yZQ5m:
        $data["start_time"] = $_GPC["start_time"];
        goto tGWMK;
        EqVSB:
        $data["storetype2_id"] = $_GPC["storetype2_id"];
        goto lhNK9;
        UCPaM:
        $data["img"] = $_GPC["img"];
        goto yZQ5m;
        V1xup:
        $res = pdo_insert("ymktv_sun_store", $data);
        goto IWqZ_;
        bKwm6:
        $data["ad"] = $_GPC["ad"];
        goto UCPaM;
        dfgNV:
        $data["details"] = $_GPC["details"];
        goto JAmCL;
        IWqZ_:
        $store_id = pdo_insertid();
        goto j0KWw;
        YG8d9:
        $data["time_over"] = 2;
        goto l89nD;
        mgC5V:
        echo $store_id;
        goto f7DvJ;
        X6aOd:
        $data["tgbj"] = $_GPC["tgbj"];
        goto nymKN;
        CTysz:
        $data["user_id"] = $_GPC["user_id"];
        goto knsCd;
        JoFJp:
        $data["vr_link"] = $_GPC["vr_link"];
        goto m17mg;
        jp4sf:
        $data["state"] = 1;
        goto idmBi;
        xFhSd:
        $data["keyword"] = $_GPC["keyword"];
        goto Uz2wg;
        y51_D:
        $data["announcement"] = $_GPC["announcement"];
        goto dpcVD;
        Q00by:
    }
    public function doPageUpdStore()
    {
        goto R8Wh0;
        pq_cu:
        goto RTZNC;
        goto W6k7e;
        l6itB:
        if ($res) {
            goto OwPbk;
        }
        goto xhK0M;
        aJsWx:
        $data["type"] = $_GPC["type"];
        goto No5xw;
        OHdYG:
        $data["skzf"] = $_GPC["skzf"];
        goto z3hXv;
        W6k7e:
        OwPbk:
        goto utjUq;
        a28uG:
        if (!$_GPC["type"]) {
            goto yvq_m;
        }
        goto aJsWx;
        Ftzma:
        yvq_m:
        goto yhwOy;
        uRGiL:
        goto ZrRJ9;
        goto Ah4yB;
        R8Wh0:
        global $_W, $_GPC;
        goto SN7b5;
        Ku9D0:
        $data["vr_link"] = $_GPC["vr_link"];
        goto qL7uA;
        qQAGj:
        $data["state"] = 2;
        goto WMRXZ;
        PYo5O:
        $res = pdo_update("ymktv_sun_store", $data, array("id" => $_GPC["id"]));
        goto l6itB;
        KwKFa:
        $data["storetype2_id"] = $_GPC["storetype2_id"];
        goto UDRs0;
        xhK0M:
        echo "2";
        goto pq_cu;
        z3hXv:
        $data["wifi"] = $_GPC["wifi"];
        goto VIQxc;
        utjUq:
        echo "1";
        goto rL2_V;
        jAU7p:
        $data["ad"] = $_GPC["ad"];
        goto N6CGm;
        yhwOy:
        $data["money"] = $_GPC["money"];
        goto hGZdp;
        hGZdp:
        $data["details"] = $_GPC["details"];
        goto mpRaa;
        IoUPo:
        $data["uniacid"] = $_W["uniacid"];
        goto PYo5O;
        anbBe:
        $data["announcement"] = $_GPC["announcement"];
        goto GKkHy;
        N61_a:
        $data["jzxy"] = $_GPC["jzxy"];
        goto d0sC9;
        N6CGm:
        $data["img"] = $_GPC["img"];
        goto ubT5u;
        UDRs0:
        $data["area_id"] = $_GPC["area_id"];
        goto tjXS0;
        uhdw5:
        $data["tel"] = $_GPC["tel"];
        goto yWa6L;
        GKkHy:
        $data["storetype_id"] = $_GPC["storetype_id"];
        goto KwKFa;
        eJ3TQ:
        $data["end_time"] = $_GPC["end_time"];
        goto fkq62;
        Ah4yB:
        IGv3i:
        goto qQAGj;
        VIQxc:
        $data["mftc"] = $_GPC["mftc"];
        goto N61_a;
        rL2_V:
        RTZNC:
        goto hIw9y;
        WMRXZ:
        ZrRJ9:
        goto a28uG;
        No5xw:
        $data["time_over"] = 2;
        goto Ftzma;
        mpRaa:
        $data["coordinates"] = $_GPC["coordinates"];
        goto IoUPo;
        gILaR:
        $data["sfxx"] = $_GPC["sfxx"];
        goto uhdw5;
        fkq62:
        $data["keyword"] = $_GPC["keyword"];
        goto OHdYG;
        d0sC9:
        $data["tgbj"] = $_GPC["tgbj"];
        goto gILaR;
        sGoic:
        $data["state"] = 1;
        goto uRGiL;
        mapHA:
        $data["store_name"] = $_GPC["store_name"];
        goto tVRU0;
        qL7uA:
        $data["weixin_logo"] = $_GPC["weixin_logo"];
        goto jAU7p;
        yWa6L:
        $data["logo"] = $_GPC["logo"];
        goto Ku9D0;
        tVRU0:
        $data["address"] = $_GPC["address"];
        goto anbBe;
        tjXS0:
        $data["start_time"] = $_GPC["start_time"];
        goto eJ3TQ;
        SN7b5:
        $system = pdo_get("ymktv_sun_system", array("uniacid" => $_W["uniacid"]));
        goto mapHA;
        ubT5u:
        if ($system["sj_audit"] == 2) {
            goto IGv3i;
        }
        goto sGoic;
        hIw9y:
    }


    public function doPageStoreList()
    {
        goto rQBwS;
        JeSbu:
        pdo_update("ymktv_sun_store", array("time_over" => 1), array("sh_time <=" => $time3, "type" => 3, "state" => 2));
        goto DpN8j;
        oqV0d:
        $pagesize = 10;
        goto IYKvR;
        DpN8j:
        $list = pdo_getall("ymktv_sun_store", array("uniacid" => $_W["uniacid"], "state" => 2));
        goto pqhgg;
        P051C:
        if (!$_GPC["keywords"]) {
            goto JLX6J;
        }
        goto wd1ie;
        y1xiG:
        Zk99B:
        goto w_Yj0;
        QjVon:
        $data[":name"] = $_GPC["keywords"];
        goto pcb43;
        S_bPB:
        $time3 = time() - 24 * 365 * 60 * 60;
        goto CLfOp;
        pqhgg:
        $i = 0;
        goto Ptm2d;
        kdms6:
        EHuRZ:
        goto NhalE;
        yCaQt:
        goto t6WDA;
        goto qdAT3;
        IYkMx:
        vKK8X:
        goto wxu_v;
        XK5Eh:
        $res = pdo_fetchall($select_sql, $data);
        goto e77ig;
        CLfOp:
        pdo_update("ymktv_sun_store", array("time_over" => 1), array("sh_time <=" => $time, "type" => 1, "state" => 2));
        goto Vf4_x;
        GZoal:
        $data[":name"] = $_GPC["cityname"];
        goto IYkMx;
        bTGFR:
        $where .= " and cityname LIKE  concat('%', :name,'%') ";
        goto GZoal;
        vfyuE:
        $select_sql = $sql . " LIMIT " . ($pageindex - 1) * $pagesize . "," . $pagesize;
        goto XK5Eh;
        Vf4_x:
        pdo_update("ymktv_sun_store", array("time_over" => 1), array("sh_time <=" => $time2, "type" => 2, "state" => 2));
        goto JeSbu;
        WNPYs:
        goto t6WDA;
        goto kkOj6;
        hWER3:
        goto t6WDA;
        goto WQFtd;
        WQFtd:
        NrqMp:
        goto sveUe;
        r6uBF:
        if ($list[$i]["type"] == 3) {
            goto pkmme;
        }
        goto WNPYs;
        lm1g6:
        $data[":uniacid"] = $_W["uniacid"];
        goto P051C;
        WqeVn:
        pdo_update("ymktv_sun_store", array("dq_time" => $list[$i]["sh_time"] + 24 * 60 * 60 * 365), array("id" => $list[$i]["id"]));
        goto isG6L;
        iWgGN:
        if ($list[$i]["type"] == 2) {
            goto NrqMp;
        }
        goto r6uBF;
        isG6L:
        t6WDA:
        goto y1xiG;
        lZmkT:
        if (!($i < count($list))) {
            goto EHuRZ;
        }
        goto Xuvb6;
        e77ig:
        echo json_encode($res);
        goto XYVba;
        NuBMf:
        $time2 = time() - 24 * 182 * 60 * 60;
        goto S_bPB;
        wxu_v:
        $pageindex = max(1, intval($_GPC["page"]));
        goto oqV0d;
        zEJ7Q:
        goto a0G_N;
        goto kdms6;
        Ptm2d:
        a0G_N:
        goto lZmkT;
        OGfc5:
        if (!$_GPC["cityname"]) {
            goto vKK8X;
        }
        goto bTGFR;
        NhalE:
        $where = " where uniacid=:uniacid and time_over !=1 and state=2";
        goto lm1g6;
        ct_FG:
        pdo_update("ymktv_sun_store", array("dq_time" => $list[$i]["sh_time"] + 24 * 60 * 60 * 7), array("id" => $list[$i]["id"]));
        goto hWER3;
        Xuvb6:
        if ($list[$i]["type"] == 1) {
            goto YlFQW;
        }
        goto iWgGN;
        kkOj6:
        YlFQW:
        goto ct_FG;
        IYKvR:
        $sql = "select * from" . tablename("ymktv_sun_store") . $where . " order by is_top,sh_time DESC";
        goto vfyuE;
        wd1ie:
        $where .= " and (store_name LIKE  concat('%', :name,'%') or keyword LIKE  concat('%', :name,'%'))";
        goto QjVon;
        s4JMk:
        $time = time() - 24 * 60 * 60 * 7;
        goto NuBMf;
        sveUe:
        pdo_update("ymktv_sun_store", array("dq_time" => $list[$i]["sh_time"] + 24 * 60 * 60 * 182), array("id" => $list[$i]["id"]));
        goto yCaQt;
        qdAT3:
        pkmme:
        goto WqeVn;
        w_Yj0:
        $i++;
        goto zEJ7Q;
        pcb43:
        JLX6J:
        goto OGfc5;
        rQBwS:
        global $_W, $_GPC;
        goto s4JMk;
        XYVba:
    }
    public function doPageTypeStoreList()
    {
        goto hQqlf;
        lWxf9:
        $i = 0;
        goto zzNUW;
        r5gtb:
        goto QchZg;
        goto Qn5Rp;
        Qn5Rp:
        IDQoo:
        goto RF6uq;
        xbudu:
        $i++;
        goto WFapw;
        zVvEv:
        $time3 = time() - 24 * 365 * 60 * 60;
        goto JUz2l;
        zzNUW:
        CQVpI:
        goto FOus_;
        hQqlf:
        global $_W, $_GPC;
        goto a_Jc2;
        nqzb1:
        $list = pdo_getall("ymktv_sun_store", array("uniacid" => $_W["uniacid"], "state" => 2));
        goto lWxf9;
        bq4As:
        echo json_encode($res);
        goto z660R;
        SjQgl:
        pdo_update("ymktv_sun_store", array("dq_time" => $list[$i]["sh_time"] + 24 * 60 * 60 * 7), array("id" => $list[$i]["id"]));
        goto WqWR4;
        JUz2l:
        pdo_update("ymktv_sun_store", array("time_over" => 1), array("sh_time <=" => $time, "type" => 1, "state" => 2));
        goto DMrSZ;
        DMrSZ:
        pdo_update("ymktv_sun_store", array("time_over" => 1), array("sh_time <=" => $time2, "type" => 2, "state" => 2));
        goto Yp4fP;
        YQdOG:
        goto QchZg;
        goto hetiO;
        WqWR4:
        goto QchZg;
        goto SRnID;
        a_Jc2:
        $time = time() - 24 * 60 * 60 * 7;
        goto dY_O7;
        RF6uq:
        pdo_update("ymktv_sun_store", array("dq_time" => $list[$i]["sh_time"] + 24 * 60 * 60 * 365), array("id" => $list[$i]["id"]));
        goto o9RFT;
        fFm5H:
        tF3JV:
        goto xbudu;
        WFapw:
        goto CQVpI;
        goto soH_x;
        Es_8Y:
        $res = pdo_getall("ymktv_sun_store", array("uniacid" => $_W["uniacid"], "time_over !=" => 1, "storetype_id" => $_GPC["storetype_id"], "state" => 2), array(), '', "num asc");
        goto bq4As;
        RKsqx:
        pdo_update("ymktv_sun_store", array("dq_time" => $list[$i]["sh_time"] + 24 * 60 * 60 * 182), array("id" => $list[$i]["id"]));
        goto r5gtb;
        FOus_:
        if (!($i < count($list))) {
            goto etR6a;
        }
        goto FNqnm;
        hetiO:
        LE7Vg:
        goto SjQgl;
        Yp4fP:
        pdo_update("ymktv_sun_store", array("time_over" => 1), array("sh_time <=" => $time3, "type" => 3, "state" => 2));
        goto nqzb1;
        o9RFT:
        QchZg:
        goto fFm5H;
        dY_O7:
        $time2 = time() - 24 * 182 * 60 * 60;
        goto zVvEv;
        FNqnm:
        if ($list[$i]["type"] == 1) {
            goto LE7Vg;
        }
        goto wGZ5a;
        eCLy8:
        if ($list[$i]["type"] == 3) {
            goto IDQoo;
        }
        goto YQdOG;
        wGZ5a:
        if ($list[$i]["type"] == 2) {
            goto sfPUD;
        }
        goto eCLy8;
        SRnID:
        sfPUD:
        goto RKsqx;
        soH_x:
        etR6a:
        goto Es_8Y;
        z660R:
    }
    public function doPageMyStore()
    {
        goto YcsvV;
        qMWTy:
        $res = pdo_fetch($sql, array(":store_id" => $_GPC["user_id"]));
        goto Thm2h;
        F2PN8:
        $sql = "select a.*,b.type_name,c.name as type2_name from " . tablename("ymktv_sun_store") . " a" . " left join " . tablename("ymktv_sun_storetype") . " b on b.id=a.storetype_id  " . " left join " . tablename("ymktv_sun_storetype2") . " c on a.storetype2_id=c.id  WHERE a.id=:store_id  ORDER BY a.id DESC";
        goto qMWTy;
        YcsvV:
        global $_W, $_GPC;
        goto F2PN8;
        Thm2h:
        echo json_encode($res);
        goto LNZUu;
        LNZUu:
    }
    public function doPageSjdLogin()
    {
        goto d89o3;
        d89o3:
        global $_W, $_GPC;
        goto gG8Nj;
        OzBrw:
        echo json_encode($res);
        goto eWMXD;
        rxn3j:
        $res = pdo_fetch($sql, array(":user_id" => $_GPC["user_id"]));
        goto OzBrw;
        gG8Nj:
        $sql = "select a.*,b.type_name,c.name as type2_name from " . tablename("ymktv_sun_store") . " a" . " left join " . tablename("ymktv_sun_storetype") . " b on b.id=a.storetype_id  " . " left join " . tablename("ymktv_sun_storetype2") . " c on a.storetype2_id=c.id  WHERE a.user_id=:user_id  ORDER BY a.id DESC";
        goto rxn3j;
        eWMXD:
    }
    public function doPageStoreInfo()
    {
        goto fyxrP;
        OtXEW:
        $res2 = pdo_fetchall($sql2, array(":id" => $_GPC["id"]));
        goto lnJpt;
        lnJpt:
        $data["store"] = $res;
        goto PYk6J;
        cJWHv:
        $res = pdo_getall("ymktv_sun_store", array("id" => $_GPC["id"]));
        goto UjBj6;
        EFGbZ:
        pdo_update("ymktv_sun_store", array("views +=" => 1), array("id" => $_GPC["id"]));
        goto cJWHv;
        gT0YU:
        echo json_encode($data);
        goto B9YT1;
        PYk6J:
        $data["pl"] = $res2;
        goto gT0YU;
        fyxrP:
        global $_W, $_GPC;
        goto EFGbZ;
        UjBj6:
        $sql2 = "select a.*,b.img as user_img,b.name from " . tablename("ymktv_sun_comments") . " a" . " left join " . tablename("ymktv_sun_user") . " b on b.id=a.user_id  WHERE a.store_id=:id  ORDER BY a.id DESC";
        goto OtXEW;
        B9YT1:
    }
    public function doPageArea()
    {
        goto Vz3G3;
        Vz3G3:
        global $_W, $_GPC;
        goto uMKft;
        uMKft:
        $res = pdo_getall("ymktv_sun_area", array("uniacid" => $_W["uniacid"]));
        goto DA60k;
        DA60k:
        echo json_encode($res);
        goto wlEPf;
        wlEPf:
    }
    public function doPageStoreType()
    {
        goto jqchL;
        jqchL:
        global $_W, $_GPC;
        goto LN9p6;
        uD44y:
        echo json_encode($res);
        goto nnyrH;
        LN9p6:
        $res = pdo_getall("ymktv_sun_storetype", array("uniacid" => $_W["uniacid"], "state" => 1), array(), '', "num asc");
        goto uD44y;
        nnyrH:
    }
    public function doPageStoreType2()
    {
        goto eT27M;
        eT27M:
        global $_W, $_GPC;
        goto J9Bhn;
        J9Bhn:
        $res = pdo_getall("ymktv_sun_storetype2", array("type_id" => $_GPC["type_id"]));
        goto RHUGc;
        RHUGc:
        echo json_encode($res);
        goto lY_xG;
        lY_xG:
    }
    public function doPageMap()
    {
        goto nscqY;
        khjcA:
        $url = "https://apis.map.qq.com/ws/geocoder/v1/?location=" . $op . "&key=" . $res["mapkey"] . "&get_poi=0&coord_type=1";
        goto h8BWM;
        nscqY:
        global $_GPC, $_W;
        goto sfteV;
        Y2oKS:
        echo $html;
        goto WgHlz;
        h8BWM:
        $html = file_get_contents($url);
        goto Y2oKS;
        sfteV:
        $op = $_GPC["op"];
        goto rq0t5;
        rq0t5:
        $res = pdo_get("ymktv_sun_system", array("uniacid" => $_W["uniacid"]));
        goto khjcA;
        WgHlz:
    }
    public function doPageSystem()
    {
        goto hWxo0;
        hWxo0:
        global $_W, $_GPC;
        goto W0E1a;
        K2uFS:
        $res["address_y"] = (float) $res["address_zb"][1];
        goto ZMxpK;
        W0E1a:
        $res = pdo_get("ymktv_sun_system", array("uniacid" => $_W["uniacid"]));
        goto znIcN;
        b5fCq:
        $res["address_x"] = (float) $res["address_zb"][0];
        goto K2uFS;
        znIcN:
        $res["address_zb"] = explode(",", $res["address_zb"]);
        goto b5fCq;
        ZMxpK:
        echo json_encode($res);
        goto Pqpbp;
        Pqpbp:
    }
    public function doPageNews()
    {
        goto n5qCk;
        GrSsJ:
        L3kFc:
        goto v0dX1;
        qEREf:
        $sql = "select * from " . tablename("ymktv_sun_news") . $where . " order by num asc";
        goto FU4TI;
        uDsuB:
        $data[":name"] = $_GPC["cityname"];
        goto GrSsJ;
        v0dX1:
        $data[":uniacid"] = $_W["uniacid"];
        goto qEREf;
        inhck:
        $where .= " and cityname LIKE  concat('%', :name,'%')";
        goto uDsuB;
        zUWM2:
        if (!$_GPC["cityname"]) {
            goto L3kFc;
        }
        goto inhck;
        TPOSU:
        $where = " where uniacid=:uniacid and state=1";
        goto zUWM2;
        k7cvD:
        echo json_encode($res);
        goto hDBIk;
        FU4TI:
        $res = pdo_fetchall($sql, $data);
        goto k7cvD;
        n5qCk:
        global $_GPC, $_W;
        goto TPOSU;
        hDBIk:
    }
    public function doPageNewsInfo()
    {
        goto JN2rj;
        JN2rj:
        global $_W, $_GPC;
        goto qZZiA;
        QLpzi:
        echo json_encode($res);
        goto YDx2o;
        qZZiA:
        $res = pdo_get("ymktv_sun_news", array("id" => $_GPC["id"]));
        goto QLpzi;
        YDx2o:
    }
    public function doPageCollection()
    {
        goto f8T17;
        UKQns:
        HbwWN:
        goto De6oU;
        qnvlC:
        if ($list) {
            goto x_Qhj;
        }
        goto Qwe0D;
        GkzbL:
        if ($res) {
            goto F82Bc;
        }
        goto PbW0C;
        GbHeD:
        $data["information_id"] = $_GPC["information_id"];
        goto UKQns;
        f8T17:
        global $_W, $_GPC;
        goto Ylb8u;
        KxnEJ:
        pdo_delete("ymktv_sun_share", $data);
        goto sCQBS;
        xhieO:
        $data["user_id"] = $_GPC["user_id"];
        goto Xf3UN;
        Xf3UN:
        $list = pdo_get("ymktv_sun_share", $data);
        goto qnvlC;
        PbW0C:
        echo "2";
        goto N4j2N;
        Ylb8u:
        if (!$_GPC["information_id"]) {
            goto HbwWN;
        }
        goto GbHeD;
        sCQBS:
        DSl4S:
        goto O8q00;
        MH9VI:
        $data["store_id"] = $_GPC["store_id"];
        goto dIqZa;
        tmWsC:
        Wx9BC:
        goto XN7DD;
        dIqZa:
        UN_ws:
        goto xhieO;
        N4j2N:
        goto Wx9BC;
        goto CyNbi;
        XN7DD:
        goto DSl4S;
        goto m_jAB;
        iHj_m:
        echo "1";
        goto tmWsC;
        m_jAB:
        x_Qhj:
        goto KxnEJ;
        De6oU:
        if (!$_GPC["store_id"]) {
            goto UN_ws;
        }
        goto MH9VI;
        CyNbi:
        F82Bc:
        goto iHj_m;
        Qwe0D:
        $res = pdo_insert("ymktv_sun_share", $data);
        goto GkzbL;
        O8q00:
    }
    public function doPageIsCollection()
    {
        goto s6kHu;
        s6kHu:
        global $_W, $_GPC;
        goto pIJLa;
        mEH09:
        lxPd3:
        goto p10ij;
        pIJLa:
        if (!$_GPC["information_id"]) {
            goto lxPd3;
        }
        goto sWyzv;
        dPbmE:
        wJmcW:
        goto b2xSc;
        JXOSH:
        $data["store_id"] = $_GPC["store_id"];
        goto rVSub;
        sWyzv:
        $data["information_id"] = $_GPC["information_id"];
        goto mEH09;
        b2xSc:
        echo "1";
        goto CHeKx;
        p10ij:
        if (!$_GPC["store_id"]) {
            goto OtowU;
        }
        goto JXOSH;
        tdoiD:
        echo "2";
        goto qzrzO;
        qzrzO:
        goto qEP9Y;
        goto dPbmE;
        p8lrE:
        $data["user_id"] = $_GPC["user_id"];
        goto cvZic;
        Dt0AU:
        if ($list) {
            goto wJmcW;
        }
        goto tdoiD;
        rVSub:
        OtowU:
        goto p8lrE;
        CHeKx:
        qEP9Y:
        goto uVfUx;
        cvZic:
        $list = pdo_get("ymktv_sun_share", $data);
        goto Dt0AU;
        uVfUx:
    }
    public function doPageMyCollection()
    {
        goto QWaKH;
        QWaKH:
        global $_W, $_GPC;
        goto LVd1X;
        XvoPk:
        echo json_encode($res);
        goto V0trp;
        a_7bJ:
        $res = pdo_fetchall($sql, array(":user_id" => $_GPC["user_id"]));
        goto XvoPk;
        LVd1X:
        $sql = "select a.*,b.img,b.details,b.time,b.top,c.type_name,d.name as type2_name,e.img as user_img,e.name as user_name from" . tablename("ymktv_sun_share") . " a" . " left join " . tablename("ymktv_sun_information") . " b on b.id=a.information_id " . " left join " . tablename("ymktv_sun_type") . " c on b.type_id=c.id " . " left join " . tablename("ymktv_sun_type2") . " d on b.type2_id=d.id " . " left join " . tablename("ymktv_sun_user") . " e on b.user_id=e.id WHERE a.user_id=:user_id  ORDER BY b.top DESC,b.id DESC";
        goto a_7bJ;
        V0trp:
    }
    public function doPageMyStoreCollection()
    {
        goto d7Y_V;
        UkX3X:
        echo json_encode($res);
        goto ruVvU;
        UyddU:
        $sql = "select a.*,b.store_name,b.address,b.tel,b.logo,b.score,b.views,b.coordinates from" . tablename("ymktv_sun_share") . " a" . " left join " . tablename("ymktv_sun_store") . " b on b.id=a.store_id  WHERE a.user_id=:user_id  ORDER BY a.id DESC";
        goto r5fe7;
        d7Y_V:
        global $_W, $_GPC;
        goto UyddU;
        r5fe7:
        $res = pdo_fetchall($sql, array(":user_id" => $_GPC["user_id"]));
        goto UkX3X;
        ruVvU:
    }
    public function doPageInMoney()
    {
        goto PxcEy;
        PxcEy:
        global $_W, $_GPC;
        goto JW67q;
        wFZGq:
        echo json_encode($res);
        goto v3UF3;
        JW67q:
        $res = pdo_getall("ymktv_sun_in", array("uniacid" => $_W["uniacid"]), array(), '', "num asc");
        goto wFZGq;
        v3UF3:
    }
    public function doPageGetHelp()
    {
        goto cc_PI;
        Vj55x:
        $res = pdo_getall("ymktv_sun_help", array("uniacid" => $_W["uniacid"]), array(), '', "sort ASC");
        goto P4J2c;
        cc_PI:
        global $_W, $_GPC;
        goto Vj55x;
        P4J2c:
        echo json_encode($res);
        goto Zbqyn;
        Zbqyn:
    }
    public function doPageSms()
    {
        goto JOllH;
        Rue9X:
        $data = file_get_contents($url);
        goto KSiXL;
        c3bU7:
        $code = $_GPC["code"];
        goto DT5SX;
        cH1_Z:
        $url = "http://v.juhe.cn/sms/send?mobile=" . $tel . "&tpl_id=" . $tpl_id . "&tpl_value=%23code%23%3D" . $code . "&key=" . $key;
        goto Rue9X;
        DT5SX:
        $key = $res["appkey"];
        goto cH1_Z;
        YHfnm:
        $res = pdo_get("ymktv_sun_sms", array("uniacid" => $_W["uniacid"]));
        goto GKWOs;
        GKWOs:
        $tpl_id = $res["tpl_id"];
        goto SqPC1;
        KSiXL:
        print_r($data);
        goto EugPG;
        SqPC1:
        $tel = $_GPC["tel"];
        goto c3bU7;
        JOllH:
        global $_W, $_GPC;
        goto YHfnm;
        EugPG:
    }
    public function doPageHxCode()
    {
        goto hf3BU;
        hf3BU:
        global $_W, $_GPC;
        goto bGlUy;
        IlhMU:
        function getCoade($user_id)
        {
            goto EwAuy;
            l9N58:
            function set_msg($user_id)
            {
                goto Ax6v3;
                TPDW_:
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                goto Wh1V_;
                Wh1V_:
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                goto JR7jG;
                Ax6v3:
                $access_token = getaccess_token();
                goto UB9kY;
                JR7jG:
                curl_setopt($ch, CURLOPT_POST, 1);
                goto pIjGB;
                ZVJl9:
                $url = "https://api.weixin.qq.com/wxa/getwxacodeunlimit?access_token=" . $access_token . '';
                goto oDZM2;
                a5fTV:
                $data2 = json_encode($data2);
                goto ZVJl9;
                EuElh:
                return $data;
                goto FL2Go;
                QFRtF:
                $data = curl_exec($ch);
                goto seFuq;
                UB9kY:
                $data2 = array("scene" => $user_id, "width" => 100);
                goto a5fTV;
                oDZM2:
                $ch = curl_init();
                goto AeeMu;
                seFuq:
                curl_close($ch);
                goto EuElh;
                AeeMu:
                curl_setopt($ch, CURLOPT_URL, $url);
                goto TPDW_;
                pIjGB:
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data2);
                goto QFRtF;
                FL2Go:
            }
            goto rkN5t;
            lmo0B:
            $img = base64_encode($img);
            goto ys0pU;
            EwAuy:
            function getaccess_token()
            {
                goto ydKTK;
                E7ImX:
                return $data["access_token"];
                goto Qw5El;
                quxj9:
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                goto b9hg0;
                bJNjN:
                $data = json_decode($data, true);
                goto E7ImX;
                p5RQJ:
                $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=" . $appid . "&secret=" . $secret . '';
                goto xM8_e;
                z3f9q:
                $secret = $res["appsecret"];
                goto p5RQJ;
                oV0se:
                $appid = $res["appid"];
                goto z3f9q;
                AopWZ:
                $res = pdo_get("ymktv_sun_system", array("uniacid" => $_W["uniacid"]));
                goto oV0se;
                tAZcB:
                curl_close($ch);
                goto bJNjN;
                jS0At:
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                goto quxj9;
                ydKTK:
                global $_W, $_GPC;
                goto AopWZ;
                mDcR1:
                curl_setopt($ch, CURLOPT_URL, $url);
                goto jS0At;
                xM8_e:
                $ch = curl_init();
                goto mDcR1;
                b9hg0:
                $data = curl_exec($ch);
                goto tAZcB;
                Qw5El:
            }
            goto l9N58;
            ys0pU:
            return $img;
            goto H742Q;
            rkN5t:
            $img = set_msg($user_id);
            goto lmo0B;
            H742Q:
        }
        goto jTSKS;
        jTSKS:
        echo getCoade($_GPC["user_id"]);
        goto EN_V8;
        bGlUy:
        load()->func("tpl");
        goto IlhMU;
        EN_V8:
    }
    public function doPageCodeIn()
    {
        goto dqeRn;
        jkD_M:
        if ($list) {
            goto eez0P;
        }
        goto QKQVw;
        Bw7yb:
        eez0P:
        goto NbrYK;
        exxTG:
        $date["money"] = $res["fx_money"];
        goto kaN_Q;
        kaN_Q:
        $date["uniacid"] = $_W["uniacid"];
        goto l3hMe;
        AKcY1:
        $user = pdo_get("ymktv_sun_user", array("opneid" => $_GPC["openid"]));
        goto CkRfv;
        l3hMe:
        $list = pdo_get("ymktv_sun_fx", $data);
        goto jkD_M;
        QKQVw:
        $date["time"] = time();
        goto FP2FG;
        UaG4x:
        $res = pdo_get("ymktv_sun_system", array("uniacid" => $_W["uniacid"]));
        goto xlUVi;
        EuzfK:
        $date["zf_user_id"] = $_GPC["zf_user_id"];
        goto exxTG;
        Tg6L_:
        pdo_update("ymktv_sun_user", array("money +=" => $date["money"]), array("id" => $_GPC["user_id"]));
        goto Bw7yb;
        dqeRn:
        global $_W, $_GPC;
        goto AKcY1;
        xlUVi:
        $date["user_id"] = $_GPC["user_id"];
        goto EuzfK;
        FP2FG:
        $res2 = pdo_insert("ymktv_sun_fx", $data);
        goto Tg6L_;
        CkRfv:
        if ($user) {
            goto GbtX7;
        }
        goto UaG4x;
        NbrYK:
        GbtX7:
        goto OQBOn;
        OQBOn:
    }
    public function doPageGetHong()
    {
        goto oMnVO;
        oMnVO:
        global $_W, $_GPC;
        goto FnIey;
        Wv8LE:
        $data["money"] = $money;
        goto hGZtS;
        FakiP:
        $data["money"] = $res["hb_money"];
        goto pfNEM;
        yhAUp:
        GGAvD:
        goto cbBR4;
        EaZ9v:
        echo $hong[$num];
        goto S2y2A;
        yKBNZ:
        echo $data["money"];
        goto KqZnA;
        XA_E1:
        if (!(!$list and count($user) < $res["hb_num"])) {
            goto GGAvD;
        }
        goto nxrFv;
        cQdLF:
        if (!$get) {
            goto s3cB3;
        }
        goto fB1JW;
        aa4Bk:
        goto G2dDT;
        goto RFf5g;
        tJvzi:
        echo "error";
        goto aa4Bk;
        pKXpF:
        $data["uniacid"] = $_W["uniacid"];
        goto dhIur;
        iria3:
        if ($res["hb_num"] > $count["total"]) {
            goto uSq43;
        }
        goto tJvzi;
        pFQMc:
        cLaW1:
        goto lZ0xA;
        pfNEM:
        $data["time"] = time();
        goto pKXpF;
        dhIur:
        $get = pdo_insert("ymktv_sun_hblq", $data);
        goto rhMUi;
        NZKuG:
        $hong = json_decode($res["hong"]);
        goto OZDRR;
        mcYUy:
        $money = $hong[$num];
        goto jGBTk;
        rhMUi:
        if (!$get) {
            goto dpmEp;
        }
        goto H1X2G;
        fB1JW:
        pdo_update("ymktv_sun_user", array("money +=" => $hong[$num]), array("id" => $_GPC["user_id"]));
        goto EaZ9v;
        hGZtS:
        $data["time"] = time();
        goto k2ziO;
        lZ0xA:
        goto I5wdj;
        goto Bvq5k;
        nxrFv:
        $num = count($user);
        goto mcYUy;
        y3miL:
        if (!($res["hb_random"] == 2)) {
            goto cLaW1;
        }
        goto zY5pL;
        x6CHs:
        $data["tz_id"] = $_GPC["id"];
        goto FakiP;
        k2ziO:
        $data["uniacid"] = $_W["uniacid"];
        goto DxLMU;
        S2y2A:
        s3cB3:
        goto yhAUp;
        g8h2J:
        $data["tz_id"] = $_GPC["id"];
        goto Wv8LE;
        Bvq5k:
        rm90A:
        goto NZKuG;
        FnIey:
        $res = pdo_get("ymktv_sun_information", array("id" => $_GPC["id"]));
        goto ytbo3;
        jGBTk:
        $data["user_id"] = $_GPC["user_id"];
        goto g8h2J;
        zY5pL:
        $data["user_id"] = $_GPC["user_id"];
        goto x6CHs;
        H1X2G:
        pdo_update("ymktv_sun_user", array("money +=" => $data["money"]), array("id" => $_GPC["user_id"]));
        goto yKBNZ;
        cbBR4:
        I5wdj:
        goto Pm3vo;
        RFf5g:
        uSq43:
        goto SVbF8;
        Pm3vo:
        G2dDT:
        goto EIlLw;
        SVbF8:
        if ($res["hb_random"] == 1) {
            goto rm90A;
        }
        goto y3miL;
        gWiWW:
        $user = pdo_getall("ymktv_sun_hblq", array("tz_id" => $_GPC["id"]));
        goto XA_E1;
        ytbo3:
        $count = pdo_get("ymktv_sun_hblq", array("tz_id" => $_GPC["id"]), array("count(id) as total"));
        goto iria3;
        DxLMU:
        $get = pdo_insert("ymktv_sun_hblq", $data);
        goto cQdLF;
        OZDRR:
        $list = pdo_getall("ymktv_sun_hblq", array("tz_id" => $_GPC["id"], "user_id" => $_GPC["user_id"]));
        goto gWiWW;
        KqZnA:
        dpmEp:
        goto pFQMc;
        EIlLw:
    }
    public function doPageHongList()
    {
        goto rlXRt;
        gWeVb:
        $sql = "select a.*,b.img,b.name from" . tablename("ymktv_sun_hblq") . " a" . " left join " . tablename("ymktv_sun_user") . " b on b.id=a.user_id  WHERE a.tz_id=:tz_id  ORDER BY a.id DESC";
        goto BE2NJ;
        rlXRt:
        global $_W, $_GPC;
        goto gWeVb;
        BE2NJ:
        $list = pdo_fetchall($sql, array(":tz_id" => $_GPC["id"]));
        goto Q2JSN;
        Q2JSN:
        echo json_encode($list);
        goto eQEYE;
        eQEYE:
    }
    public function doPageHong()
    {
        goto i_ufc;
        vMWbK:
        print_r(hongbao(1, 5));
        goto oekBB;
        jd6FW:
        function hongbao($money, $number, $ratio = 1)
        {
            goto WmAix;
            UOXc4:
            $money -= $money;
            goto Zzz6C;
            L2WT8:
            if (!($i < $number)) {
                goto vghI2;
            }
            goto yC79F;
            L2J2j:
            $i = 0;
            goto jeceS;
            YioWI:
            $i = 0;
            goto LjK1h;
            ZqSCW:
            if ($money >= $randRes) {
                goto f0JUB;
            }
            goto NysEJ;
            Aydfs:
            vghI2:
            goto NeK1p;
            WmAix:
            $res = array();
            goto XH6FR;
            Q1OZ3:
            $randMax = ($max - $min) * $randRatio;
            goto L2J2j;
            yC79F:
            $randRes = mt_rand(0, $randMax);
            goto HmZNQ;
            jeceS:
            n5V18:
            goto L2WT8;
            HA_z9:
            goto n5V18;
            goto Aydfs;
            kVTyd:
            $res[$i] += $randRes;
            goto ttgW7;
            LjK1h:
            YAkWr:
            goto USNey;
            JhOwl:
            $money = $money - $min * $number;
            goto QFvlK;
            knM8e:
            $i = 0;
            goto ggQEa;
            xl560:
            $i++;
            goto ykwtI;
            LvpFy:
            ptR8I:
            goto T8R_C;
            iSjbX:
            $res[$i] = $min;
            goto Pt8GM;
            WEjzJ:
            XBS24:
            goto Eerqd;
            XC3Gz:
            $i++;
            goto mmMGy;
            mmMGy:
            goto pWHdq;
            goto FdOJg;
            SiG0B:
            $i++;
            goto HA_z9;
            u0ev3:
            $res[$i] += $avg;
            goto d54K5;
            XH6FR:
            $min = 0.01;
            goto SbfG6;
            YxAkE:
            goto Pbs3F;
            goto ZIhfD;
            Zzz6C:
            Pbs3F:
            goto RjFOu;
            IRkRW:
            if (!($i < $number)) {
                goto zyiZj;
            }
            goto iSjbX;
            T8R_C:
            return $res;
            goto aV3tk;
            NysEJ:
            if ($money > 0) {
                goto XBS24;
            }
            goto B0u8V;
            QFvlK:
            $randRatio = 100;
            goto Q1OZ3;
            RjFOu:
            KM04N:
            goto SiG0B;
            B0u8V:
            goto vghI2;
            goto YxAkE;
            ttgW7:
            $money -= $randRes;
            goto r_yNp;
            d54K5:
            QM3nu:
            goto xl560;
            W9Ona:
            $money = 0;
            goto HE53q;
            li_fA:
            shuffle($res);
            goto KEHrp;
            r_yNp:
            goto Pbs3F;
            goto WEjzJ;
            NeK1p:
            if (!($money > 0)) {
                goto JrQzW;
            }
            goto h0KSa;
            ykwtI:
            goto YAkWr;
            goto HM6Fg;
            HmZNQ:
            $randRes = $randRes / $randRatio;
            goto ZqSCW;
            Eerqd:
            $res[$i] += $money;
            goto UOXc4;
            KEHrp:
            foreach ($res as $k => $v) {
                goto Iidp2;
                LAr3c:
                lsFyo:
                goto vGoxs;
                bc8Bp:
                $match[0] = number_format($match[0], 2);
                goto b4Eg4;
                Iidp2:
                preg_match("/^\\d+(\\.\\d{1,2})?/", $v, $match);
                goto bc8Bp;
                b4Eg4:
                $res[$k] = $match[0];
                goto LAr3c;
                vGoxs:
            }
            goto LvpFy;
            SbfG6:
            $max = $money / $number * (1 + $ratio);
            goto knM8e;
            USNey:
            if (!($i < $number)) {
                goto iO0mq;
            }
            goto u0ev3;
            HE53q:
            JrQzW:
            goto li_fA;
            h0KSa:
            $avg = $money / $number;
            goto YioWI;
            ZIhfD:
            f0JUB:
            goto kVTyd;
            FdOJg:
            zyiZj:
            goto JhOwl;
            Pt8GM:
            yPSJR:
            goto XC3Gz;
            ggQEa:
            pWHdq:
            goto IRkRW;
            HM6Fg:
            iO0mq:
            goto W9Ona;
            aV3tk:
        }
        goto vMWbK;
        i_ufc:
        global $_W, $_GPC;
        goto jd6FW;
        oekBB:
    }
    public function doPageTiXian()
    {
        goto Y9xO5;
        dmwib:
        $data["username"] = $_GPC["username"];
        goto tWIWH;
        VHCR1:
        pdo_update("ymktv_sun_user", array("money -=" => $_GPC["tx_cost"]), array("id" => $_GPC["user_id"]));
        goto xTEYh;
        q2aJw:
        $data["state"] = 1;
        goto cMUyz;
        z7175:
        goto nCoL8;
        goto dpCtH;
        CLOcQ:
        echo "2";
        goto KnONs;
        quT0p:
        if ($res) {
            goto PbJgB;
        }
        goto CLOcQ;
        KnONs:
        goto e8z6j;
        goto iniNW;
        cdPGS:
        nCoL8:
        goto PGWsF;
        iniNW:
        PbJgB:
        goto IL3hb;
        iW_2D:
        $data["name"] = $_GPC["name"];
        goto dmwib;
        PGWsF:
        echo $txsh_id;
        goto fimYV;
        HUWwd:
        Bkz5C:
        goto Y7RqT;
        APxpb:
        $data["tx_cost"] = $_GPC["tx_cost"];
        goto qc2li;
        Y9xO5:
        global $_W, $_GPC;
        goto iW_2D;
        Y7RqT:
        pdo_update("ymktv_sun_store", array("wallet -=" => $_GPC["tx_cost"]), array("id" => $_GPC["store_id"]));
        goto cdPGS;
        JQpJ4:
        $txsh_id = pdo_insertid();
        goto quT0p;
        L2_jS:
        $data["user_id"] = $_GPC["user_id"];
        goto EW2s0;
        s2SV1:
        $data["time"] = time();
        goto q2aJw;
        tWIWH:
        $data["type"] = $_GPC["type"];
        goto APxpb;
        Cla3s:
        $res = pdo_insert("ymktv_sun_withdrawal", $data);
        goto JQpJ4;
        qEocA:
        $data["method"] = $_GPC["method"];
        goto s2SV1;
        EW2s0:
        $data["store_id"] = $_GPC["store_id"];
        goto qEocA;
        IL3hb:
        if ($_GPC["method"] == 1) {
            goto e5eLp;
        }
        goto HbDkP;
        fimYV:
        e8z6j:
        goto sguD9;
        cMUyz:
        $data["uniacid"] = $_W["uniacid"];
        goto Cla3s;
        xTEYh:
        goto nCoL8;
        goto HUWwd;
        dpCtH:
        e5eLp:
        goto VHCR1;
        HbDkP:
        if ($_GPC["method"] == 2) {
            goto Bkz5C;
        }
        goto z7175;
        qc2li:
        $data["sj_cost"] = $_GPC["sj_cost"];
        goto L2_jS;
        sguD9:
    }
    public function doPageMyTiXian()
    {
        goto fRijU;
        fRijU:
        global $_W, $_GPC;
        goto oCvlx;
        cmPzb:
        echo json_encode($res);
        goto TbhVd;
        oCvlx:
        $res = pdo_getall("ymktv_sun_withdrawal", array("user_id" => $_GPC["user_id"]));
        goto cmPzb;
        TbhVd:
    }
    public function doPageStoreTiXian()
    {
        goto YU3GU;
        NhTJL:
        $res = pdo_getall("ymktv_sun_withdrawal", array("store_id" => $_GPC["store_id"]));
        goto W_WFj;
        YU3GU:
        global $_W, $_GPC;
        goto NhTJL;
        W_WFj:
        echo json_encode($res);
        goto UWEkO;
        UWEkO:
    }
    public function doPageHbmx()
    {
        goto oLoRZ;
        plIpu:
        echo json_encode($res);
        goto XjJLP;
        oLoRZ:
        global $_W, $_GPC;
        goto QOdIv;
        QOdIv:
        $res = pdo_getall("ymktv_sun_hblq", array("user_id" => $_GPC["user_id"]), array(), '', "time DESC");
        goto plIpu;
        XjJLP:
    }
    public function doPageIsSms()
    {
        goto RfpSv;
        hhoO_:
        $res = pdo_get("ymktv_sun_sms", array("uniacid" => $_W["uniacid"]));
        goto F3hN8;
        F3hN8:
        echo $res["is_open"];
        goto BeqyZ;
        RfpSv:
        global $_W, $_GPC;
        goto hhoO_;
        BeqyZ:
    }
    public function doPageJiemi()
    {
        goto N2P_h;
        HENbt:
        print $data . "\n";
        goto I6HX3;
        b8Gi2:
        include_once IA_ROOT . "/addons/ymktv_sun/wxBizDataCrypt.php";
        goto z51Mr;
        LKEfC:
        if ($errCode == 0) {
            goto RRn_c;
        }
        goto abUyz;
        oSJad:
        $sessionKey = $_GPC["sessionKey"];
        goto nCeDZ;
        N2P_h:
        global $_W, $_GPC;
        goto D_yKO;
        I6HX3:
        isbcq:
        goto T06sI;
        z51Mr:
        $appid = $res["appid"];
        goto oSJad;
        s5XfB:
        $iv = $_GPC["iv"];
        goto Z4y5p;
        Z4y5p:
        $pc = new WXBizDataCrypt($appid, $sessionKey);
        goto B2My9;
        Tb4fO:
        goto isbcq;
        goto Qsti1;
        nCeDZ:
        $encryptedData = $_GPC["data"];
        goto s5XfB;
        abUyz:
        print $errCode . "\n";
        goto Tb4fO;
        B2My9:
        $errCode = $pc->decryptData($encryptedData, $iv, $data);
        goto LKEfC;
        Qsti1:
        RRn_c:
        goto HENbt;
        D_yKO:
        $res = pdo_get("ymktv_sun_system", array("uniacid" => $_W["uniacid"]));
        goto b8Gi2;
        T06sI:
    }
    public function doPageZxType()
    {
        goto Ex8nq;
        cAvfD:
        echo json_encode($res);
        goto D0Z7v;
        pU1AK:
        $res = pdo_getall("ymktv_sun_zx_type", array("uniacid" => $_W["uniacid"]), array(), '', "sort asc");
        goto cAvfD;
        Ex8nq:
        global $_W, $_GPC;
        goto pU1AK;
        D0Z7v:
    }
    public function doPageZx()
    {
        goto guhuA;
        guhuA:
        global $_W, $_GPC;
        goto xVphh;
        aTAal:
        echo "1";
        goto rcQW4;
        MG3N8:
        F5i6v:
        goto hhv0d;
        Wjf4i:
        if ($res) {
            goto CMxAa;
        }
        goto kVBsY;
        g2VAl:
        goto o7huH;
        goto qyisn;
        rcQW4:
        o7huH:
        goto PXkRJ;
        j9rkg:
        $res = pdo_insert("ymktv_sun_zx", $data);
        goto Wjf4i;
        QiV8H:
        $data["state"] = 2;
        goto vKU9h;
        xVphh:
        $data["type_id"] = $_GPC["type_id"];
        goto uEIJ6;
        jEES8:
        $data["title"] = $_GPC["title"];
        goto Fpy20;
        PMmOe:
        if ($system["is_zx"] == 1) {
            goto IMIAZ;
        }
        goto QiV8H;
        J_jId:
        $data["imgs"] = $_GPC["imgs"];
        goto dVHCZ;
        dVHCZ:
        $data["time"] = date("Y-m-d H:i:s");
        goto eveS3;
        vKU9h:
        goto F5i6v;
        goto zKzlT;
        Fpy20:
        $data["content"] = $_GPC["content"];
        goto J_jId;
        kVBsY:
        echo "2";
        goto g2VAl;
        qyisn:
        CMxAa:
        goto aTAal;
        oOGX3:
        $data["state"] = 1;
        goto MG3N8;
        zKzlT:
        IMIAZ:
        goto oOGX3;
        eveS3:
        $data["cityname"] = $_GPC["cityname"];
        goto LzuJo;
        LzuJo:
        $system = pdo_get("ymktv_sun_system", array("uniacid" => $_W["uniacid"]));
        goto PMmOe;
        KMHp9:
        $data["user_id"] = $_GPC["user_id"];
        goto jEES8;
        uEIJ6:
        $data["type"] = 1;
        goto KMHp9;
        hhv0d:
        $data["uniacid"] = $_W["uniacid"];
        goto j9rkg;
        PXkRJ:
    }
    public function doPageZxList()
    {
        goto V8pmm;
        i3Onv:
        if (!$_GPC["cityname"]) {
            goto PGA_m;
        }
        goto jZWSH;
        AsNv4:
        $where = " where a.uniacid=:uniacid and  a.state=2";
        goto quHli;
        f_CF5:
        $select_sql = $sql . " LIMIT " . ($pageindex - 1) * $pagesize . "," . $pagesize;
        goto c1qDq;
        G1Rwt:
        $where .= " and  a.type_id=:type_id";
        goto g1dTi;
        c9OPb:
        PGA_m:
        goto rk4J3;
        V8pmm:
        global $_W, $_GPC;
        goto dlaMl;
        IJ5NC:
        AhNFh:
        goto i3Onv;
        BoWR7:
        if (!$_GPC["type_id"]) {
            goto AhNFh;
        }
        goto G1Rwt;
        dlaMl:
        $pageindex = max(1, intval($_GPC["page"]));
        goto xJ2mR;
        xJ2mR:
        $pagesize = 10;
        goto AsNv4;
        g1dTi:
        $data[":type_id"] = $_GPC["type_id"];
        goto IJ5NC;
        jZWSH:
        $where .= " and a.cityname LIKE  concat('%', :name,'%') ";
        goto ocka7;
        FbBhy:
        echo json_encode($res);
        goto LkCs7;
        ocka7:
        $data[":name"] = $_GPC["cityname"];
        goto c9OPb;
        rk4J3:
        $sql = "select a.*,b.img,b.name,c.type_name from" . tablename("ymktv_sun_zx") . " a" . " left join " . tablename("ymktv_sun_user") . " b on b.id=a.user_id " . " left join " . tablename("ymktv_sun_zx_type") . " c on a.type_id=c.id" . $where . "  ORDER BY a.id DESC";
        goto f_CF5;
        c1qDq:
        $res = pdo_fetchall($select_sql, $data);
        goto FbBhy;
        quHli:
        $data[":uniacid"] = $_W["uniacid"];
        goto BoWR7;
        LkCs7:
    }
    public function doPageZxInfo()
    {
        goto AguEX;
        LBfsY:
        pdo_update("ymktv_sun_zx", array("yd_num +=" => 1), array("id" => $_GPC["id"]));
        goto nYq2E;
        xpNoK:
        QWh1m:
        goto L11Nx;
        AguEX:
        global $_W, $_GPC;
        goto LBfsY;
        lT9gN:
        $dz = pdo_get("ymktv_sun_like", array("zx_id" => $_GPC["id"], "user_id" => $_GPC["user_id"]));
        goto xRe5v;
        RKxS1:
        $res["dz"] = 2;
        goto isham;
        nYq2E:
        $sql = "select a.*,b.img,b.name,c.type_name from" . tablename("ymktv_sun_zx") . " a" . " left join " . tablename("ymktv_sun_user") . " b on b.id=a.user_id " . " left join " . tablename("ymktv_sun_zx_type") . " c on a.type_id=c.id WHERE a.id=:id  ORDER BY a.id DESC";
        goto Zw7H1;
        isham:
        goto YfdZg;
        goto xpNoK;
        L11Nx:
        $res["dz"] = 1;
        goto vFlpw;
        Zw7H1:
        $res = pdo_fetch($sql, array(":id" => $_GPC["id"]));
        goto lT9gN;
        vFlpw:
        YfdZg:
        goto XC_n1;
        xRe5v:
        if ($dz) {
            goto QWh1m;
        }
        goto RKxS1;
        XC_n1:
        echo json_encode($res);
        goto n306i;
        n306i:
    }
    public function doPageZxPl()
    {
        goto JLNXE;
        XM63Z:
        $data["uniacid"] = $_W["uniacid"];
        goto m7_Pv;
        a4YOH:
        if ($res) {
            goto uOHMO;
        }
        goto RnWrR;
        a9_S4:
        $data["user_id"] = $_GPC["user_id"];
        goto vAHDE;
        m7_Pv:
        $res = pdo_insert("ymktv_sun_zx_assess", $data);
        goto a4YOH;
        U09pj:
        uOHMO:
        goto itvBN;
        RnWrR:
        echo "2";
        goto rdiuh;
        vAHDE:
        $data["status"] = 2;
        goto XM63Z;
        egjPg:
        $data["zx_id"] = $_GPC["zx_id"];
        goto q4TEd;
        JLNXE:
        global $_W, $_GPC;
        goto egjPg;
        q4TEd:
        $data["content"] = $_GPC["content"];
        goto ogzlj;
        itvBN:
        echo "1";
        goto VZKTM;
        VZKTM:
        fpYaR:
        goto KOlSC;
        rdiuh:
        goto fpYaR;
        goto U09pj;
        ogzlj:
        $data["cerated_time"] = date("Y-m-d H:i:s");
        goto a9_S4;
        KOlSC:
    }
    public function doPageZxHf()
    {
        goto WqzAN;
        g2_tn:
        echo "1";
        goto sb3fS;
        WqzAN:
        global $_W, $_GPC;
        goto J07ZB;
        XXUAX:
        $data["reply_time"] = date("Y-m-d H:i:s");
        goto y3M0P;
        bouIw:
        echo "2";
        goto Rp3M1;
        kv7go:
        yrf4b:
        goto g2_tn;
        sk9Zb:
        $data["status"] = 1;
        goto XXUAX;
        J07ZB:
        $data["reply"] = $_GPC["reply"];
        goto sk9Zb;
        Rp3M1:
        goto MKZ12;
        goto kv7go;
        sb3fS:
        MKZ12:
        goto L3P82;
        y3M0P:
        $res = pdo_update("ymktv_sun_zx_assess", $data, array("id" => $_GPC["id"]));
        goto VQBYY;
        VQBYY:
        if ($res) {
            goto yrf4b;
        }
        goto bouIw;
        L3P82:
    }
    public function doPageZxPlList()
    {
        goto tW0re;
        eP3Sj:
        $sql = "select a.*,b.img as user_img,b.name from " . tablename("ymktv_sun_zx_assess") . " a" . " left join " . tablename("ymktv_sun_user") . " b on b.id=a.user_id  WHERE a.zx_id=:zx_id  ORDER BY a.id DESC";
        goto rUunN;
        wEYnE:
        echo json_encode($res);
        goto NRfyV;
        rUunN:
        $res = pdo_fetchall($sql, array(":zx_id" => $_GPC["zx_id"]));
        goto wEYnE;
        tW0re:
        global $_W, $_GPC;
        goto eP3Sj;
        NRfyV:
    }
    public function doPageFootprint()
    {
        goto CjukI;
        DqHDp:
        MSgIb:
        goto ZxA2i;
        lUx2O:
        AXTpm:
        goto KOXVA;
        gSHvP:
        $res = pdo_update("ymktv_sun_zx_zj", array("time" => time()), array("id" => $list["id"]));
        goto Md370;
        TjGlr:
        $data["zx_id"] = $_GPC["zx_id"];
        goto DIF_u;
        kksZ4:
        echo "2";
        goto bF8nf;
        fI_d2:
        $res = pdo_insert("ymktv_sun_zx_zj", $data);
        goto fj_GT;
        MmBKR:
        $list = pdo_get("ymktv_sun_zx_zj", array("user_id" => $_GPC["user_id"], "zx_id" => $_GPC["zx_id"]));
        goto DCPrP;
        rZwQy:
        mk1pW:
        goto k1Rba;
        YjS8b:
        echo "2";
        goto G7j2p;
        xL03W:
        IqxFp:
        goto gSHvP;
        CjukI:
        global $_W, $_GPC;
        goto MJrH0;
        DIF_u:
        $data["uniacid"] = $_W["uniacid"];
        goto MZp7l;
        k1Rba:
        echo "1";
        goto lUx2O;
        MJrH0:
        $data["user_id"] = $_GPC["user_id"];
        goto TjGlr;
        KOXVA:
        goto x8IGg;
        goto xL03W;
        Md370:
        if ($res) {
            goto MSgIb;
        }
        goto kksZ4;
        slhrl:
        p1qyJ:
        goto sxqdk;
        fj_GT:
        if ($res) {
            goto mk1pW;
        }
        goto YjS8b;
        G7j2p:
        goto AXTpm;
        goto rZwQy;
        MZp7l:
        $data["time"] = time();
        goto MmBKR;
        bF8nf:
        goto p1qyJ;
        goto DqHDp;
        DCPrP:
        if ($list) {
            goto IqxFp;
        }
        goto fI_d2;
        sxqdk:
        x8IGg:
        goto YtrNO;
        ZxA2i:
        echo "1";
        goto slhrl;
        YtrNO:
    }
    public function doPageMyFootprint()
    {
        goto Y3Dte;
        c5qEB:
        echo json_encode($res);
        goto k3c7z;
        NkD_W:
        $sql = "select a.*,b.title,b.imgs,b.time as zx_time,c.type_name,d.name as user_name,d.img as user_img from " . tablename("ymktv_sun_zx_zj") . " a" . " left join " . tablename("ymktv_sun_zx") . " b on b.id=a.zx_id " . " left join " . tablename("ymktv_sun_zx_type") . " c on b.type_id=c.id  " . " left join " . tablename("ymktv_sun_user") . " d on b.user_id=d.id WHERE a.user_id=:user_id  ORDER BY a.time DESC";
        goto bpyYR;
        Y3Dte:
        global $_W, $_GPC;
        goto NkD_W;
        bpyYR:
        $res = pdo_fetchall($sql, array(":user_id" => $_GPC["user_id"]));
        goto c5qEB;
        k3c7z:
    }
    public function doPageStoreCode()
    {
        goto TTPZX;
        ILElO:
        $new_file = IA_ROOT . "/addons/ymktv_sun/inc/upload/";
        goto yJbSS;
        HGeo9:
        mkdir($new_file, 0777);
        goto bE2QM;
        wjcfw:
        function getCoade($storeid)
        {
            goto uLBuy;
            MGAS8:
            $img = set_msg($storeid);
            goto wdPcn;
            t0yHX:
            function set_msg($storeid)
            {
                goto NFdAE;
                CeXnJ:
                curl_setopt($ch, CURLOPT_URL, $url);
                goto bhg1M;
                xhcSL:
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                goto Gu3YE;
                bhg1M:
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                goto xhcSL;
                wi3ey:
                $url = "https://api.weixin.qq.com/wxa/getwxacodeunlimit?access_token=" . $access_token . '';
                goto HMRam;
                j0yk8:
                curl_close($ch);
                goto oxv6a;
                l9xvg:
                $data2 = json_encode($data2);
                goto wi3ey;
                j13x6:
                $data = curl_exec($ch);
                goto j0yk8;
                DuCxx:
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data2);
                goto j13x6;
                Gu3YE:
                curl_setopt($ch, CURLOPT_POST, 1);
                goto DuCxx;
                r5BKy:
                $data2 = array("scene" => $storeid, "page" => "ymktv_sun/pages/sellerinfo/sellerinfo", "width" => 400);
                goto l9xvg;
                HMRam:
                $ch = curl_init();
                goto CeXnJ;
                NFdAE:
                $access_token = getaccess_token();
                goto r5BKy;
                oxv6a:
                return $data;
                goto ULL23;
                ULL23:
            }
            goto MGAS8;
            uLBuy:
            function getaccess_token()
            {
                goto smigL;
                ALBKJ:
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                goto CIGsM;
                CIGsM:
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                goto qcZJV;
                K03bC:
                $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=" . $appid . "&secret=" . $secret . '';
                goto Cufrc;
                dBsOF:
                $appid = $res["appid"];
                goto t6ejl;
                JXau7:
                return $data["access_token"];
                goto tfymu;
                smigL:
                global $_W, $_GPC;
                goto LQhf5;
                CHjZt:
                $data = json_decode($data, true);
                goto JXau7;
                qcZJV:
                $data = curl_exec($ch);
                goto FNF_6;
                LQhf5:
                $res = pdo_get("ymktv_sun_system", array("uniacid" => $_W["uniacid"]));
                goto dBsOF;
                p3A5i:
                curl_setopt($ch, CURLOPT_URL, $url);
                goto ALBKJ;
                FNF_6:
                curl_close($ch);
                goto CHjZt;
                Cufrc:
                $ch = curl_init();
                goto p3A5i;
                t6ejl:
                $secret = $res["appsecret"];
                goto K03bC;
                tfymu:
            }
            goto t0yHX;
            wdPcn:
            $img = base64_encode($img);
            goto DPeYQ;
            DPeYQ:
            return $img;
            goto G3DZj;
            G3DZj:
        }
        goto i8bTU;
        i8bTU:
        $base64 = getCoade($_GPC["store_id"]);
        goto KZJ0D;
        HnoSa:
        $ename = "tcsj" . $_GPC["store_id"];
        goto jDWfi;
        fDWI0:
        $type = $result[2];
        goto ILElO;
        jrqIa:
        goto PTqfB;
        goto YIfbK;
        Rz97f:
        $wname = $ename . ".{$type}";
        goto etZ1E;
        s1ddg:
        echo "新文件保存失败";
        goto jrqIa;
        o0wXm:
        if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_image_content)))) {
            goto SNoPO;
        }
        goto s1ddg;
        nkG7A:
        echo $_W["siteroot"] . "addons/ymktv_sun/inc/upload/tcsj{$_GPC["store_id"]}.jpeg";
        goto MD9qk;
        KZJ0D:
        $base64_image_content = "data:image/jpeg;base64," . $base64;
        goto HnoSa;
        etZ1E:
        $new_file = $new_file . $wname;
        goto o0wXm;
        YIfbK:
        SNoPO:
        goto o6caJ;
        yJbSS:
        if (file_exists($new_file)) {
            goto hS5pg;
        }
        goto HGeo9;
        o6caJ:
        goto W3H8i;
        W3H8i:
        PTqfB:
        goto tur0a;
        jDWfi:
        if (!preg_match("/^(data:\\s*image\\/(\\w+);base64,)/", $base64_image_content, $result)) {
            goto O583b;
        }
        goto fDWI0;
        bE2QM:
        hS5pg:
        goto Rz97f;
        tur0a:
        O583b:
        goto nkG7A;
        TTPZX:
        global $_W, $_GPC;
        goto wjcfw;
        MD9qk:
    }
    public function doPageCarTag()
    {
        goto tlOpV;
        KIR0K:
        $res = pdo_getall("ymktv_sun_car_tag", array("typename" => $_GPC["typename"]));
        goto kb1dx;
        kb1dx:
        echo json_encode($res);
        goto KTlum;
        tlOpV:
        global $_W, $_GPC;
        goto KIR0K;
        KTlum:
    }
    public function doPageCar()
    {
        goto EjKag;
        l1TF0:
        goto qA0Bj;
        goto zHp4D;
        YF1FM:
        $data["cityname"] = $_GPC["cityname"];
        goto tmXkY;
        i1Jm_:
        $data2["tag_id"] = $sz[$i]["tag_id"];
        goto J9EUs;
        EjKag:
        global $_W, $_GPC;
        goto edff7;
        JWmK1:
        echo $post_id;
        goto EEkQP;
        EEkQP:
        V4JYT:
        goto osQBs;
        PDMLY:
        if ($res) {
            goto WBiun;
        }
        goto CYoaU;
        m4f5M:
        $post_id = pdo_insertid();
        goto T46U3;
        kKfNZ:
        $i++;
        goto l1TF0;
        baKw2:
        if (!($i < count($sz))) {
            goto rf4KL;
        }
        goto i1Jm_;
        CYoaU:
        echo "2";
        goto Jk5c6;
        xHmv6:
        $data["end_lat"] = $_GPC["end_lat"];
        goto HgqN5;
        tmXkY:
        $data["is_open"] = 1;
        goto Om9bm;
        H0hPK:
        $data["other"] = $_GPC["other"];
        goto ydetR;
        W8WrT:
        $data["num"] = $_GPC["num"];
        goto SZNHg;
        FiW33:
        $i = 0;
        goto B98mL;
        MTw75:
        $data["start_place"] = $_GPC["start_place"];
        goto gB9JO;
        edff7:
        $system = pdo_get("ymktv_sun_system", array("uniacid" => $_W["uniacid"]));
        goto VS11a;
        i3_GE:
        $data["state"] = 1;
        goto JZNK_;
        rgInq:
        $data["state"] = 2;
        goto HAmKd;
        lKFcx:
        $data["link_tel"] = $_GPC["link_tel"];
        goto fJziR;
        cYLxm:
        $res = pdo_insert("ymktv_sun_car", $data);
        goto m4f5M;
        gJiEc:
        f3vXp:
        goto i3_GE;
        wvSAX:
        goto FysvO;
        goto gJiEc;
        uwHcQ:
        X3EHQ:
        goto kKfNZ;
        Xoqwi:
        $data["hw_wet"] = $_GPC["hw_wet"];
        goto Vpgrf;
        B98mL:
        qA0Bj:
        goto baKw2;
        W0iMc:
        $data["uniacid"] = $_W["uniacid"];
        goto V1xMe;
        CJhXX:
        $data["start_time"] = $_GPC["start_time"];
        goto DYFln;
        zHp4D:
        rf4KL:
        goto JWmK1;
        HAmKd:
        $data["sh_time"] = time();
        goto wvSAX;
        J9EUs:
        $data2["car_id"] = $post_id;
        goto Hy5Vj;
        HgqN5:
        $data["end_lng"] = $_GPC["end_lng"];
        goto YF1FM;
        V1xMe:
        if ($system["is_car"] == 1) {
            goto f3vXp;
        }
        goto rgInq;
        gB9JO:
        $data["end_place"] = $_GPC["end_place"];
        goto CJhXX;
        XhK70:
        $data["star_lng"] = $_GPC["star_lng"];
        goto xHmv6;
        SZNHg:
        $data["link_name"] = $_GPC["link_name"];
        goto lKFcx;
        DYFln:
        $data["start_time2"] = strtotime($_GPC["start_time"]);
        goto W8WrT;
        w0wbz:
        $sz = json_decode(json_encode($a), true);
        goto PDMLY;
        Hy5Vj:
        $res2 = pdo_insert("ymktv_sun_car_my_tag", $data2);
        goto uwHcQ;
        JZNK_:
        FysvO:
        goto cYLxm;
        T46U3:
        $a = json_decode(html_entity_decode($_GPC["sz"]));
        goto w0wbz;
        Vpgrf:
        $data["star_lat"] = $_GPC["star_lat"];
        goto XhK70;
        VS11a:
        $data["user_id"] = $_GPC["user_id"];
        goto MTw75;
        fJziR:
        $data["typename"] = $_GPC["typename"];
        goto H0hPK;
        qHTSa:
        WBiun:
        goto FiW33;
        Jk5c6:
        goto V4JYT;
        goto qHTSa;
        ydetR:
        $data["tj_place"] = $_GPC["tj_place"];
        goto Xoqwi;
        Om9bm:
        $data["time"] = time();
        goto W0iMc;
        osQBs:
    }
    public function doPageMyCar()
    {
        goto ihp1R;
        mGSWF:
        $res = pdo_getall("ymktv_sun_car", array("user_id" => $_GPC["user_id"]));
        goto DMDG9;
        DMDG9:
        echo json_encode($res);
        goto ePl2i;
        ihp1R:
        global $_W, $_GPC;
        goto mGSWF;
        ePl2i:
    }
    public function doPageCarList()
    {
        goto ypeNH;
        bY2f7:
        $select_sql = $sql . " LIMIT " . ($pageindex - 1) * $pagesize . "," . $pagesize;
        goto jTOxO;
        Bj3y3:
        $pagesize = 10;
        goto dmP06;
        L_ykv:
        goto WBsqR;
        goto amGjD;
        PLZkT:
        DZ3rt:
        goto asaIP;
        dZYwh:
        goto YU4fz;
        goto kKn7y;
        ys9Pe:
        pdo_update("ymktv_sun_car", array("is_open" => 2), array("start_time2 <=" => $time));
        goto FqjT9;
        kKn7y:
        swrt2:
        goto Ntmw_;
        dmP06:
        $where = " where uniacid=:uniacid";
        goto kjYjI;
        FlRfe:
        $k = 0;
        goto U2Y6Q;
        m7g6K:
        $res2 = pdo_fetchall($sql2);
        goto vqVl2;
        jTOxO:
        $res = pdo_fetchall($select_sql, $data);
        goto BuBd3;
        J8uTj:
        if (!$_GPC["cityname"]) {
            goto nGfIN;
        }
        goto JkJxw;
        asaIP:
        $k++;
        goto dZYwh;
        iloGq:
        nGfIN:
        goto R4yNK;
        JkJxw:
        $where .= " and cityname LIKE  concat('%', :name,'%') ";
        goto jBTqQ;
        xcgVf:
        if (!($res[$i]["id"] == $res2[$k]["car_id"])) {
            goto eLS2P;
        }
        goto VtIRx;
        VtIRx:
        $data[] = array("tagname" => $res2[$k]["tagname"]);
        goto TM92r;
        Q53Tm:
        $data = array();
        goto FlRfe;
        BuBd3:
        $sql2 = "select a.*,b.tagname from " . tablename("ymktv_sun_car_my_tag") . " a" . " left join " . tablename("ymktv_sun_car_tag") . " b on b.id=a.car_id";
        goto m7g6K;
        R4yNK:
        $sql = " select * from " . tablename("ymktv_sun_car") . $where . " order by id DESC";
        goto bY2f7;
        Ntmw_:
        $data2[] = array("tz" => $res[$i], "label" => $data);
        goto X_TUU;
        SCw2Z:
        $time = time();
        goto ys9Pe;
        J1Cj0:
        WBsqR:
        goto v6_5g;
        U2Y6Q:
        YU4fz:
        goto Jv0rj;
        vqVl2:
        $data2 = array();
        goto sfJle;
        jBTqQ:
        $data[":name"] = $_GPC["cityname"];
        goto iloGq;
        v6_5g:
        if (!($i < count($res))) {
            goto DKf2x;
        }
        goto Q53Tm;
        QLmcL:
        $i++;
        goto L_ykv;
        kjYjI:
        $data[":uniacid"] = $_W["uniacid"];
        goto J8uTj;
        X_TUU:
        pcxHp:
        goto QLmcL;
        TM92r:
        eLS2P:
        goto PLZkT;
        ypeNH:
        global $_W, $_GPC;
        goto SCw2Z;
        FqjT9:
        $pageindex = max(1, intval($_GPC["page"]));
        goto Bj3y3;
        Jv0rj:
        if (!($k < count($res2))) {
            goto swrt2;
        }
        goto xcgVf;
        sfJle:
        $i = 0;
        goto J1Cj0;
        a2rwv:
        echo json_encode($data2);
        goto i38Ox;
        amGjD:
        DKf2x:
        goto a2rwv;
        i38Ox:
    }
    public function doPageTypeCarList()
    {
        goto go3on;
        RyMvl:
        if (!($res[$i]["id"] == $res2[$k]["car_id"])) {
            goto GJxMN;
        }
        goto q3AnV;
        q3AnV:
        $data[] = array("tagname" => $res2[$k]["tagname"]);
        goto G4u90;
        L2vLn:
        $i = 0;
        goto nmbxn;
        AeYSY:
        if (!($k < count($res2))) {
            goto UZlP3;
        }
        goto RyMvl;
        O6d7J:
        if (!($i < count($res))) {
            goto Hgeso;
        }
        goto gT2bQ;
        go3on:
        global $_W, $_GPC;
        goto nmp2L;
        BU7LX:
        goto FUMLt;
        goto iUPOz;
        kChBH:
        $k = 0;
        goto U5Jee;
        iUPOz:
        UZlP3:
        goto KVpx6;
        nmp2L:
        $res = pdo_getall("ymktv_sun_car", array("uniacid" => $_W["uniacid"], "typename" => $_GPC["typename"], "state" => 2), array(), '', "id DESC");
        goto HcQl4;
        KjUZ9:
        goto RV1UP;
        goto NUjiy;
        EfHog:
        $k++;
        goto BU7LX;
        ZyG14:
        echo json_encode($data2);
        goto ZKU3p;
        NUjiy:
        Hgeso:
        goto ZyG14;
        G4u90:
        GJxMN:
        goto a9mAU;
        HcQl4:
        $sql2 = "select a.*,b.tagname from " . tablename("ymktv_sun_car_my_tag") . " a" . " left join " . tablename("ymktv_sun_car_tag") . " b on b.id=a.tag_id";
        goto p8NrL;
        GHRMr:
        $i++;
        goto KjUZ9;
        KVpx6:
        $data2[] = array("tz" => $res[$i], "label" => $data);
        goto GTC5P;
        nmbxn:
        RV1UP:
        goto O6d7J;
        c4U0N:
        $data2 = array();
        goto L2vLn;
        a9mAU:
        Z69w3:
        goto EfHog;
        gT2bQ:
        $data = array();
        goto kChBH;
        U5Jee:
        FUMLt:
        goto AeYSY;
        GTC5P:
        BI_i5:
        goto GHRMr;
        p8NrL:
        $res2 = pdo_fetchall($sql2);
        goto c4U0N;
        ZKU3p:
    }
    public function doPageCarInfo()
    {
        goto oLomr;
        zuXqA:
        $data["tag"] = $res2;
        goto APQdt;
        GOlpd:
        $sql = "select a.*,b.name as user_name,b.img as user_img from " . tablename("ymktv_sun_car") . " a" . " left join " . tablename("ymktv_sun_user") . " b on b.id=a.user_id where a.id =:id";
        goto OqQXF;
        oLomr:
        global $_W, $_GPC;
        goto GOlpd;
        APQdt:
        echo json_encode($data);
        goto yv8g1;
        MIXKp:
        $data["pc"] = $res;
        goto zuXqA;
        OqQXF:
        $res = pdo_fetch($sql, array(":id" => $_GPC["id"]));
        goto EG1zR;
        qhYCB:
        $res2 = pdo_fetchall($sql2, array(":car_id" => $_GPC["id"]));
        goto MIXKp;
        EG1zR:
        $sql2 = "select a.*,b.tagname from " . tablename("ymktv_sun_car_my_tag") . " a" . " left join " . tablename("ymktv_sun_car_tag") . " b on b.id=a.tag_id where a.\n      car_id=:car_id";
        goto qhYCB;
        yv8g1:
    }
    public function doPageCarShut()
    {
        goto Zi0E4;
        wR2fk:
        if ($res) {
            goto YzeoP;
        }
        goto edh2d;
        izmh2:
        iYS8Q:
        goto H3Z97;
        WQx5E:
        $res = pdo_update("ymktv_sun_car", array("is_open" => 2), array("id" => $_GPC["id"]));
        goto wR2fk;
        wBNl5:
        YzeoP:
        goto Co2ro;
        edh2d:
        echo "2";
        goto jlG3a;
        Co2ro:
        echo "1";
        goto izmh2;
        Zi0E4:
        global $_W, $_GPC;
        goto WQx5E;
        jlG3a:
        goto iYS8Q;
        goto wBNl5;
        H3Z97:
    }
    public function doPageSpec()
    {
        goto hDXQ5;
        hDXQ5:
        global $_W, $_GPC;
        goto FyUzF;
        e2s0H:
        echo json_encode($res);
        goto j2QuZ;
        FyUzF:
        $res = pdo_getall("ymktv_sun_goods_spec", array("uniacid" => $_W["uniacid"]));
        goto e2s0H;
        j2QuZ:
    }
    public function doPageAddGoods()
    {
        goto inH9c;
        inH9c:
        global $_W, $_GPC;
        goto zzXSt;
        Al78j:
        Vhf5Q:
        goto GtXEz;
        DSPq1:
        $data["all_day"] = $_GPC["all_day"];
        goto iJcYn;
        YS2F4:
        goto z4yEs;
        goto coJmI;
        NyLvD:
        $data["uniacid"] = $_W["uniacid"];
        goto DRfRe;
        J7bro:
        if (!$_GPC["sz"]) {
            goto xSvJm;
        }
        goto nhW6n;
        mxNFG:
        $data["goods_cost"] = $_GPC["goods_cost"];
        goto vh1E_;
        AsT00:
        $data["state"] = 1;
        goto ldmkS;
        vh1E_:
        $data["goods_time"] = $_GPC["goods_time"];
        goto Q9B3f;
        EE8ug:
        $data["goods_num"] = $_GPC["goods_num"];
        goto mxNFG;
        Q9B3f:
        $data["goods_type"] = $_GPC["goods_type"];
        goto KN_5Z;
        Qdbpu:
        $data2["spec_id"] = $sz[$i]["spec_id"];
        goto ctXn3;
        cotiw:
        $data["quality"] = $_GPC["quality"];
        goto GCZfA;
        LWHxm:
        $data["state"] = 2;
        goto YS2F4;
        ctXn3:
        $data2["money"] = $sz[$i]["money"];
        goto YdSHS;
        e_OFr:
        echo "2";
        goto nksMA;
        TajdQ:
        $data2["num"] = $sz[$i]["num"];
        goto ljgks;
        eGCXS:
        $data["goods_details"] = $_GPC["goods_details"];
        goto ogQqA;
        htZYU:
        $data["weeks"] = $_GPC["weeks"];
        goto mHLuY;
        IyRDl:
        if (!$_GPC["sz"]) {
            goto gr_f2;
        }
        goto Y9MFE;
        jU5xB:
        goto Vhf5Q;
        goto GM1es;
        P8xAd:
        gr_f2:
        goto r3kbY;
        GCZfA:
        $data["free"] = $_GPC["free"];
        goto DSPq1;
        ljgks:
        $data2["goods_id"] = $post_id;
        goto HMrRU;
        coJmI:
        KaJ0_:
        goto AsT00;
        DRfRe:
        $res = pdo_insert("ymktv_sun_goods", $data);
        goto jNuxd;
        Y9MFE:
        $a = json_decode(html_entity_decode($_GPC["sz"]));
        goto HuEkD;
        F9Dxi:
        $data["store_id"] = $_GPC["store_id"];
        goto EQJXL;
        iItH4:
        $data["refund"] = $_GPC["refund"];
        goto htZYU;
        uVbS3:
        $data["imgs"] = $_GPC["imgs"];
        goto eGCXS;
        mHLuY:
        $data["lb_imgs"] = $_GPC["lb_imgs"];
        goto uVbS3;
        nksMA:
        goto qJGyL;
        goto rzf1K;
        KN_5Z:
        $data["freight"] = $_GPC["freight"];
        goto uj7ZF;
        rzf1K:
        oHnAt:
        goto J7bro;
        nhW6n:
        $i = 0;
        goto Al78j;
        iFkdu:
        $i++;
        goto jU5xB;
        kCiPB:
        xKhil:
        goto iFkdu;
        hX1dZ:
        $data["time"] = time();
        goto NyLvD;
        HMrRU:
        $res2 = pdo_insert("ymktv_sun_spec_value", $data2);
        goto kCiPB;
        ldmkS:
        z4yEs:
        goto hX1dZ;
        r3kbY:
        if ($res) {
            goto oHnAt;
        }
        goto e_OFr;
        iJcYn:
        $data["service"] = $_GPC["service"];
        goto iItH4;
        EQJXL:
        $data["goods_name"] = $_GPC["goods_name"];
        goto EE8ug;
        z3UXl:
        qJGyL:
        goto dKTCW;
        jNuxd:
        $post_id = pdo_insertid();
        goto IyRDl;
        ogQqA:
        if ($system["is_goods"] == 1) {
            goto KaJ0_;
        }
        goto LWHxm;
        GtXEz:
        if (!($i < count($sz))) {
            goto feNJQ;
        }
        goto Qdbpu;
        WFLPl:
        echo "1";
        goto z3UXl;
        d8wXd:
        xSvJm:
        goto WFLPl;
        zzXSt:
        $system = pdo_get("ymktv_sun_system", array("uniacid" => $_W["uniacid"]));
        goto F9Dxi;
        HuEkD:
        $sz = json_decode(json_encode($a), true);
        goto P8xAd;
        uj7ZF:
        $data["delivery"] = $_GPC["delivery"];
        goto cotiw;
        GM1es:
        feNJQ:
        goto d8wXd;
        YdSHS:
        $data2["name"] = $sz[$i]["name"];
        goto TajdQ;
        dKTCW:
    }
    public function doPageAddCaropen()
    {
        global $_W, $_GPC;
    }
    public function doPageUpdGoods()
    {
        goto PMofY;
        O9aM2:
        $data["service"] = $_GPC["service"];
        goto qpYc1;
        zmdzn:
        $data["goods_cost"] = $_GPC["goods_cost"];
        goto NBREA;
        K3zp1:
        UgEj5:
        goto D65rF;
        qpYc1:
        $data["refund"] = $_GPC["refund"];
        goto nIyM7;
        NBREA:
        $data["freight"] = $_GPC["freight"];
        goto BepcX;
        Dd3Yx:
        $data["state"] = 2;
        goto xjXQ4;
        H2tGI:
        echo "1";
        goto uaA00;
        klH66:
        $data["imgs"] = $_GPC["imgs"];
        goto ny6mm;
        tytAF:
        $data["uniacid"] = $_W["uniacid"];
        goto zJNPQ;
        G_vxV:
        goto oHUh9;
        goto sq3YL;
        ny6mm:
        $data["goods_details"] = $_GPC["goods_details"];
        goto DWNNe;
        xjXQ4:
        goto yQ3UD;
        goto K3zp1;
        dmzdp:
        $data["quality"] = $_GPC["quality"];
        goto IeUkL;
        wsVVn:
        $data["goods_num"] = $_GPC["goods_num"];
        goto zmdzn;
        GjoNY:
        $system = pdo_get("ymktv_sun_system", array("uniacid" => $_W["uniacid"]));
        goto y9gdo;
        DWNNe:
        if ($system["is_goods"] == 1) {
            goto UgEj5;
        }
        goto Dd3Yx;
        jIznj:
        $data["goods_name"] = $_GPC["goods_name"];
        goto wsVVn;
        PMofY:
        global $_W, $_GPC;
        goto GjoNY;
        BepcX:
        $data["delivery"] = $_GPC["delivery"];
        goto dmzdp;
        y9gdo:
        $data["store_id"] = $_GPC["store_id"];
        goto jIznj;
        sq3YL:
        Zo71M:
        goto H2tGI;
        nIyM7:
        $data["weeks"] = $_GPC["weeks"];
        goto Ksmp1;
        cFweM:
        $data["all_day"] = $_GPC["all_day"];
        goto O9aM2;
        uaA00:
        oHUh9:
        goto gwxIg;
        Ksmp1:
        $data["lb_imgs"] = $_GPC["lb_imgs"];
        goto klH66;
        F4F5r:
        $post_id = pdo_insertid();
        goto L81Yy;
        L81Yy:
        if ($res) {
            goto Zo71M;
        }
        goto r8kLP;
        D65rF:
        $data["state"] = 1;
        goto OZ2BA;
        zJNPQ:
        $res = pdo_update("ymktv_sun_goods", $data, array("id" => $_GPC["good_id"]));
        goto F4F5r;
        IeUkL:
        $data["free"] = $_GPC["free"];
        goto cFweM;
        TGW58:
        $data["time"] = time();
        goto tytAF;
        OZ2BA:
        yQ3UD:
        goto TGW58;
        r8kLP:
        echo "2";
        goto G_vxV;
        gwxIg:
    }
    public function doPageDelGood()
    {
        goto OW9Aq;
        YzVlU:
        echo "2";
        goto tudfS;
        MazJJ:
        if ($res) {
            goto h9Bjy;
        }
        goto YzVlU;
        YWNw6:
        jCVc9:
        goto BcvDj;
        gxBUZ:
        echo "1";
        goto YWNw6;
        OW9Aq:
        global $_W, $_GPC;
        goto jnQC5;
        jnQC5:
        $res = pdo_delete("ymktv_sun_goods", array("id" => $_GPC["good_id"]));
        goto MazJJ;
        lCqkM:
        $res = pdo_delete("ymktv_sun_spec_value", array("goods_id" => $_GPC["good_id"]));
        goto gxBUZ;
        x32RY:
        h9Bjy:
        goto lCqkM;
        tudfS:
        goto jCVc9;
        goto x32RY;
        BcvDj:
    }
    public function doPageDownGood()
    {
        goto R9xy6;
        ZWWih:
        echo "1";
        goto z_OzN;
        trO0p:
        $res = pdo_update("ymktv_sun_goods", array("is_show" => 2), array("id" => $_GPC["good_id"]));
        goto dDhNe;
        iMkr2:
        echo "2";
        goto uGUrq;
        z_OzN:
        aYmF7:
        goto wUbxb;
        ElQp5:
        v94OZ:
        goto ZWWih;
        R9xy6:
        global $_W, $_GPC;
        goto trO0p;
        uGUrq:
        goto aYmF7;
        goto ElQp5;
        dDhNe:
        if ($res) {
            goto v94OZ;
        }
        goto iMkr2;
        wUbxb:
    }
    public function doPageUpGood()
    {
        goto vTqEa;
        fQw_z:
        if ($res) {
            goto SLxQ5;
        }
        goto psnaD;
        psnaD:
        echo "2";
        goto HxCOM;
        wwiHJ:
        SLxQ5:
        goto jNX3t;
        HxCOM:
        goto LymfS;
        goto wwiHJ;
        CmJFJ:
        LymfS:
        goto RrDUX;
        vTqEa:
        global $_W, $_GPC;
        goto ZOfBN;
        ZOfBN:
        $res = pdo_update("ymktv_sun_goods", array("is_show" => 1), array("id" => $_GPC["good_id"]));
        goto fQw_z;
        jNX3t:
        echo "1";
        goto CmJFJ;
        RrDUX:
    }
    public function doPageGoodList()
    {
        goto O_UUI;
        p_KFw:
        $res = pdo_getall("ymktv_sun_goods", array("uniacid" => $_W["uniacid"], "state" => 2), array(), '', "id DESC");
        goto Tsoj4;
        O_UUI:
        global $_W, $_GPC;
        goto p_KFw;
        Tsoj4:
        echo json_encode($res);
        goto QH82E;
        QH82E:
    }
    public function doPageStoreGoodList()
    {
        goto Imcua;
        uUTHF:
        $res = pdo_getall("ymktv_sun_goods", array("store_id" => $_GPC["store_id"], "state" => 2), array(), '', "id DESC");
        goto jjjpX;
        Imcua:
        global $_W, $_GPC;
        goto uUTHF;
        jjjpX:
        echo json_encode($res);
        goto Ep0LE;
        Ep0LE:
    }
    public function doPageStoreGoodList2()
    {
        goto N3ayf;
        N3ayf:
        global $_W, $_GPC;
        goto IZMyO;
        IZMyO:
        $res = pdo_getall("ymktv_sun_goods", array("store_id" => $_GPC["store_id"], "state" => 2, "is_show" => 1), array(), '', "id DESC");
        goto N7ow1;
        N7ow1:
        echo json_encode($res);
        goto Zoun7;
        Zoun7:
    }
    public function doPageGoodInfo()
    {
        goto e7TlZ;
        zOLbt:
        $data["spec"] = $res2;
        goto JYBGS;
        X1PlN:
        $sql = "select a.*,b.spec_name from " . tablename("ymktv_sun_spec_value") . " a" . " left join " . tablename("ymktv_sun_goods_spec") . " b on b.id=a.spec_id  WHERE a.goods_id=:goods_id";
        goto kOKg4;
        kOKg4:
        $res2 = pdo_fetchall($sql, array(":goods_id" => $_GPC["id"]));
        goto N7jep;
        N7jep:
        $data["good"] = $res;
        goto zOLbt;
        JYBGS:
        echo json_encode($data);
        goto KTnv6;
        e7TlZ:
        global $_W, $_GPC;
        goto hDAlH;
        hDAlH:
        $res = pdo_get("ymktv_sun_goods", array("id" => $_GPC["id"]));
        goto X1PlN;
        KTnv6:
    }
    public function doPageGoodbao()
    {
        goto s8TqS;
        vtwxc:
        echo json_encode($newData);
        goto TzS9K;
        nr_mP:
        cPCOQ:
        goto xrt_f;
        oVzlU:
        $isopen = pdo_getcolumn("ymktv_sun_vipopen", array("uniacid" => $_W["uniacid"], "openid" => $openid), "isopen");
        goto fkSsj;
        Oonfq:
        $gid = $_GPC["gid"];
        goto Esjci;
        xrt_f:
        NhgRH:
        goto s3XHc;
        lHKs5:
        dDTA5:
        goto nr_mP;
        fkSsj:
        if (!($vip_open["vip_open"] == 1)) {
            goto NhgRH;
        }
        goto lm5dt;
        lx2Ud:
        $openid = $_GPC["openid"];
        goto jZPUs;
        jZPUs:
        $data = pdo_get("ymktv_sun_goods", array("uniacid" => $_W["uniacid"], "id" => $gid));
        goto j1TAd;
        M0JfZ:
        if (!($vip_open["room_dis"] && $vip_open["room_dis"] != 0)) {
            goto dDTA5;
        }
        goto XtFM5;
        s8TqS:
        global $_GPC, $_W;
        goto Oonfq;
        lm5dt:
        if (!($isopen == 1)) {
            goto cPCOQ;
        }
        goto M0JfZ;
        j1TAd:
        $vip_open = pdo_get("ymktv_sun_vip_open", array("uniacid" => $_W["uniacid"]));
        goto oVzlU;
        XtFM5:
        $price = $price * $vip_open["room_dis"] / 10;
        goto lHKs5;
        Esjci:
        $price = $_GPC["price"];
        goto lx2Ud;
        s3XHc:
        $newData = array("roomData" => $data, "price" => $price);
        goto vtwxc;
        TzS9K:
    }

    public function doPageOrderarr()
    {
      global $_GPC, $_W;
      $openid = $_GPC["openid"];
      $appData = pdo_get("ymktv_sun_system", array("uniacid" => $_W["uniacid"]));
      $appid = $appData['service_merchant_appid'];

      $sub_appid = $appData['appid'];
      $sub_mchid = $appData['mchid'];
      // var_dump($appid );die;
      $mch_id = $appData['service_merchant_number'];
      // var_dump($mch_id);die;
      $keys = $appData["service_merchant_key"];

      $price = $_GPC["price"];
      $order_url = "https://api.mch.weixin.qq.com/pay/unifiedorder";
      $data = array("appid" => $appid, "mch_id" => $mch_id, "nonce_str" => $this->createNoncestr(), "body" => time(), "out_trade_no" => date("Ymd") . substr('' . time(), -4, 4), "total_fee" => $price * 100, "spbill_create_ip" => "120.79.152.105", "notify_url" => "120.79.152.105", "trade_type" => "JSAPI", "sub_openid" => $openid,'sub_mch_id'=>$sub_mchid,'sub_appid'=>$sub_appid);
      ksort($data, SORT_ASC);
      $stringA = http_build_query($data);
      $signTempStr = $stringA . "&key=" . $keys;
      $signValue = strtoupper(md5($signTempStr));
      $data["sign"] = $signValue;
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $order_url);
      curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $this->arrayToXml($data));
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
      $result = curl_exec($ch);
      curl_close($ch);
      $result = xml2array($result);
      // var_dump($result );die;
      echo json_encode($this->createPaySign($result));
    }


    function createNoncestr($length = 32 ){
        $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        $str ="";
        for ( $i = 0; $i < $length; $i++ ) {
            $str.= substr($chars, mt_rand(0, strlen($chars)-1), 1);
        }
        return $str;
    }


    function createPaySign($result)
    {
        global $_GPC, $_W;
        $appData = pdo_get("ymktv_sun_system", array("uniacid" => $_W["uniacid"]));
        $keys = $appData["service_merchant_key"];
        $data = array("appId" => $appData["appid"], "timeStamp" => (string) time(), "nonceStr" => $result["nonce_str"], "package" => "prepay_id=" . $result["prepay_id"], "signType" => "MD5");
        ksort($data, SORT_ASC);
        $stringA = '';
        foreach ($data as $key => $val) {
            $stringA .= "{$key}={$val}&";
        }
        $signTempStr = $stringA . "key=" . $keys;
        $signValue = strtoupper(md5($signTempStr));
        $data["paySign"] = $signValue;
        return $data;
    }



    function arrayToXml($arr)
    {
        goto vAeJv;
        iBk4f:
        l056M:
        goto d8BAE;
        vAeJv:
        $xml = "<xml>";
        goto P2PfS;
        P2PfS:
        foreach ($arr as $key => $val) {
            goto jE7YJ;
            wxpc5:
            mE4ih:
            goto VxdnD;
            VxdnD:
            B2GZf:
            goto MmSUc;
            JVFUa:
            goto mE4ih;
            goto NIOHR;
            ErrhJ:
            $xml .= "<" . $key . "><![CDATA[" . $val . "]]></" . $key . ">";
            goto JVFUa;
            HPbw6:
            $xml .= "<" . $key . ">" . $val . "</" . $key . ">";
            goto wxpc5;
            NIOHR:
            JiZW5:
            goto HPbw6;
            jE7YJ:
            if (is_numeric($val)) {
                goto JiZW5;
            }
            goto ErrhJ;
            MmSUc:
        }
        goto iBk4f;
        YlBaf:
        return $xml;
        goto IKJqX;
        d8BAE:
        $xml .= "</xml>";
        goto YlBaf;
        IKJqX:
    }
    public function doPageAddOrder()
    {
        goto KcxGa;
        locNq:
        $res = pdo_insert("ymktv_sun_order", $data);
        goto vwq7l;
        Maz_s:
        $data["back_date"] = $_GPC["back_date"];
        goto nxQde;
        Cm_yf:
        $data["good_money"] = $_GPC["good_money"];
        goto Djbn4;
        zxv3z:
        $data["user_id"] = $_GPC["user_id"];
        goto hp7hB;
        dNkGZ:
        Ipjcm:
        goto DYeUt;
        MyAnO:
        $goodsInfo = pdo_get("ymktv_sun_goods", array("id" => $_GPC["good_id"], "uniacid" => $_W["uniacid"]));
        goto Vu83s;
        vyfvk:
        echo "下单失败";
        goto aVKMt;
        DYeUt:
        echo $post_id;
        goto j3Atv;
        Cla0L:
        $data["tel"] = $_GPC["tel"];
        goto rHMkl;
        Djbn4:
        $data["good_num"] = $_GPC["good_num"];
        goto zlAQT;
        rHMkl:
        $data["good_id"] = $_GPC["good_id"];
        goto m4M2D;
        yygaf:
        $data["user_name"] = $_GPC["user_name"];
        goto Cla0L;
        BwMsv:
        $data["time"] = time();
        goto BKlKJ;
        vwq7l:
        $post_id = pdo_insertid();
        goto MyAnO;
        BKlKJ:
        $data["order_num"] = date("YmdHis") . rand(1111, 9999);
        goto JgMpc;
        hp7hB:
        $data["money"] = $_GPC["money"];
        goto yygaf;
        aVKMt:
        goto OL7tj;
        goto dNkGZ;
        J6cA3:
        $data["good_img"] = $_GPC["good_img"];
        goto Cm_yf;
        KcxGa:
        global $_W, $_GPC;
        goto zxv3z;
        JgMpc:
        $data["state"] = 1;
        goto locNq;
        Vu83s:
        if ($res) {
            goto Ipjcm;
        }
        goto vyfvk;
        m4M2D:
        $data["good_name"] = $_GPC["good_name"];
        goto J6cA3;
        j3Atv:
        OL7tj:
        goto cvFG4;
        zlAQT:
        $data["start_date"] = $_GPC["start_date"];
        goto Maz_s;
        nxQde:
        $data["uniacid"] = $_W["uniacid"];
        goto BwMsv;
        cvFG4:
    }
    public function doPagePayOrder()
    {
        goto iMAdP;
        iMAdP:
        global $_W, $_GPC;
        goto cPhhv;
        e8Z8C:
        goto Ud4V4;
        goto YA7mB;
        iNhMR:
        pdo_update("ymktv_sun_goods", array("goods_num -=" => $orderinfo["good_num"], "sales +=" => $orderinfo["good_num"]), array("id" => $orderinfo["good_id"]));
        goto pXZF4;
        pXZF4:
        $res = pdo_update("ymktv_sun_order", array("state" => 2, "pay_time" => time()), array("id" => $_GPC["order_id"]));
        goto qLWmF;
        qIzGd:
        echo "1";
        goto ORCXH;
        ORCXH:
        Ud4V4:
        goto ZMzvZ;
        qLWmF:
        if ($res) {
            goto l6u9i;
        }
        goto M8Ajf;
        cPhhv:
        $orderinfo = pdo_get("ymktv_sun_order", array("id" => $_GPC["order_id"]));
        goto iNhMR;
        YA7mB:
        l6u9i:
        goto qIzGd;
        M8Ajf:
        echo "2";
        goto e8Z8C;
        ZMzvZ:
    }
    public function doPageDeliveryOrder()
    {
        goto IsZje;
        h87lL:
        if ($res) {
            goto TTFuF;
        }
        goto HjP5q;
        HjP5q:
        echo "2";
        goto agl4R;
        HVgHC:
        q3oJe:
        goto CoyO9;
        orRkB:
        $res = pdo_update("ymktv_sun_order", array("state" => 3, "fh_time" => time()), array("id" => $_GPC["order_id"]));
        goto h87lL;
        KymFu:
        TTFuF:
        goto Jq135;
        Jq135:
        echo "1";
        goto HVgHC;
        IsZje:
        global $_W, $_GPC;
        goto orRkB;
        agl4R:
        goto q3oJe;
        goto KymFu;
        CoyO9:
    }
    public function doPageCompleteOrder()
    {
        goto O71z0;
        O71z0:
        global $_W, $_GPC;
        goto i63FN;
        XMNsM:
        EJewy:
        goto TpFw2;
        OcFg0:
        $data6["son_id"] = $order["user_id"];
        goto XJiqG;
        JoCmB:
        if (!($set["is_open"] == 1)) {
            goto guwXK;
        }
        goto PZf02;
        rtKzi:
        $res = pdo_update("ymktv_sun_order", array("state" => 4, "complete_time" => time()), array("id" => $_GPC["order_id"]));
        goto HBKfV;
        khE7i:
        pdo_update("ymktv_sun_user", array("commission +=" => $money), array("id" => $userid));
        goto Fukwb;
        ipyKf:
        pdo_update("ymktv_sun_store", array("wallet +=" => $order["money"]));
        goto TlP7g;
        cStXE:
        $set = pdo_get("ymktv_sun_fxset", array("uniacid" => $_W["uniacid"]));
        goto ygvxL;
        nNLM1:
        DFqaI:
        goto RmhKR;
        rpEot:
        $data7["son_id"] = $order["user_id"];
        goto bp6AF;
        Df3mx:
        guwXK:
        goto kgHQb;
        EFPVX:
        $money = $order["money"] * ($set["commission"] / 100);
        goto Xw8ax;
        xFocz:
        $data["time"] = date("Y-m-d H:i:s");
        goto YUKSw;
        VGY6i:
        $data7["user_id"] = $userid2;
        goto rpEot;
        NzS9_:
        $user2 = pdo_get("ymktv_sun_fxuser", array("fx_user" => $user["user_id"]));
        goto mm9D5;
        zZNPZ:
        $user = pdo_get("ymktv_sun_fxuser", array("fx_user" => $order["user_id"]));
        goto mCyYv;
        ug14q:
        $userid = $user["user_id"];
        goto MXb7o;
        WGufB:
        $user = pdo_get("ymktv_sun_fxuser", array("fx_user" => $order["user_id"]));
        goto NzS9_;
        K7iDF:
        $data["type"] = 1;
        goto xFocz;
        kgHQb:
        echo "1";
        goto XMNsM;
        mCyYv:
        if (!$user) {
            goto DFqaI;
        }
        goto o3jZn;
        K2ojX:
        goiiC:
        goto wlwg9;
        i63FN:
        $order = pdo_get("ymktv_sun_order", array("id" => $_GPC["order_id"]));
        goto rtKzi;
        HBKfV:
        if ($res) {
            goto GwuQL;
        }
        goto SB0Ng;
        nP4B5:
        $data6["money"] = $money;
        goto zL6F6;
        f3opb:
        GwuQL:
        goto ipyKf;
        wlwg9:
        if (!$user2) {
            goto Jkx5I;
        }
        goto QE9Dt;
        xfSdN:
        $data["money"] = $order["money"];
        goto MITvn;
        uwH3l:
        Jkx5I:
        goto ojm90;
        ZH6FF:
        pdo_insert("ymktv_sun_earnings", $data7);
        goto uwH3l;
        vic5r:
        $data6["son_id"] = $order["user_id"];
        goto nP4B5;
        kv6w2:
        $data6["uniacid"] = $_W["uniacid"];
        goto wODU6;
        Llx0x:
        goto EJewy;
        goto f3opb;
        PwaA3:
        pdo_update("ymktv_sun_user", array("commission +=" => $money), array("id" => $userid2));
        goto VGY6i;
        o3jZn:
        $userid = $user["user_id"];
        goto EFPVX;
        bp6AF:
        $data7["money"] = $money;
        goto SORNz;
        YOuAC:
        $data7["uniacid"] = $_W["uniacid"];
        goto ZH6FF;
        SORNz:
        $data7["time"] = time();
        goto YOuAC;
        shSG4:
        pdo_insert("ymktv_sun_earnings", $data6);
        goto nNLM1;
        RmhKR:
        IC4Qp:
        goto Df3mx;
        mm9D5:
        if (!$user) {
            goto goiiC;
        }
        goto ug14q;
        SB0Ng:
        echo "2";
        goto Llx0x;
        HvzxO:
        $data6["uniacid"] = $_W["uniacid"];
        goto shSG4;
        kgaJX:
        Z_Yse:
        goto zZNPZ;
        Xw8ax:
        pdo_update("ymktv_sun_user", array("commission +=" => $money), array("id" => $userid));
        goto M7TH8;
        QE9Dt:
        $userid2 = $user2["user_id"];
        goto HZU_8;
        ygvxL:
        $order = pdo_get("ymktv_sun_order", array("id" => $_GPC["order_id"]));
        goto JoCmB;
        wODU6:
        pdo_insert("ymktv_sun_earnings", $data6);
        goto K2ojX;
        MITvn:
        $data["note"] = "商品订单";
        goto K7iDF;
        YUKSw:
        pdo_insert("ymktv_sun_store_wallet", $data);
        goto cStXE;
        Fukwb:
        $data6["user_id"] = $userid;
        goto vic5r;
        MXb7o:
        $money = $order["money"] * ($set["commission"] / 100);
        goto khE7i;
        PZf02:
        if ($set["is_ej"] == 2) {
            goto Z_Yse;
        }
        goto WGufB;
        H1RgM:
        $data6["time"] = time();
        goto HvzxO;
        ojm90:
        goto IC4Qp;
        goto kgaJX;
        M7TH8:
        $data6["user_id"] = $userid;
        goto OcFg0;
        zL6F6:
        $data6["time"] = time();
        goto kv6w2;
        TlP7g:
        $data["store_id"] = $order["store_id"];
        goto xfSdN;
        XJiqG:
        $data6["money"] = $money;
        goto H1RgM;
        HZU_8:
        $money = $order["money"] * ($set["commission2"] / 100);
        goto PwaA3;
        TpFw2:
    }
    public function doPageStoreWallet()
    {
        goto zmGjc;
        zmGjc:
        global $_W, $_GPC;
        goto xBq_s;
        xBq_s:
        $res = pdo_getall("ymktv_sun_store_wallet", array("store_id" => $_GPC["store_id"]));
        goto q_Tmz;
        q_Tmz:
        echo json_encode($res);
        goto lEsmj;
        lEsmj:
    }
    public function doPageMyOrder()
    {
        goto zhvtb;
        cHOf5:
        $sql2 = "SELECT t.id,t2.goods_id,t2.pre_type,t.good_img,t.state,t.good_num,t.order_num,t.money,t.good_name FROM ims_ymktv_sun_order t INNER JOIN (SELECT t1.id AS goods_id,t1.pre_type FROM ims_ymktv_sun_goods t1 ) AS t2 ON t2.goods_id = t.good_id AND t.uniacid = " . $_W["uniacid"] . " AND t.user_id = " . $_GPC["user_id"] . " AND t.state = 1 and t.del = 2";
        goto D2_PF;
        D2_PF:
        $noPay = pdo_fetchall($sql2);
        goto cPq5R;
        thQga:
        $sql = "SELECT t.id,t2.goods_id,t2.pre_type,t.good_img,t.state,t.good_num,t.order_num,t.money,t.good_name FROM ims_ymktv_sun_order t INNER JOIN (SELECT t1.id AS goods_id,t1.pre_type FROM ims_ymktv_sun_goods t1 ) AS t2 ON t2.goods_id = t.good_id AND t.uniacid = " . $_W["uniacid"] . " AND t.user_id = " . $_GPC["user_id"] . " and t.del = 2";
        goto Q5zO4;
        SjlN3:
        $finishPay = pdo_fetchall($sql3);
        goto jWX1M;
        AbbFT:
        R_lSV:
        goto LTHqY;
        UEFis:
        mAAt4:
        goto cHOf5;
        eIk0V:
        echo json_encode($res);
        goto sAZGN;
        mDnM4:
        goto R_lSV;
        goto yEawJ;
        yEawJ:
        O5pNm:
        goto OoShu;
        OO5Gn:
        if ($_GPC["goId"] == 1) {
            goto mAAt4;
        }
        goto XAKrn;
        QLYKn:
        goto R_lSV;
        goto ou31W;
        XAKrn:
        if ($_GPC["goId"] == 2) {
            goto O5pNm;
        }
        goto QLYKn;
        ou31W:
        xvAl_:
        goto thQga;
        F_bKA:
        if ($_GPC["goId"] == 0) {
            goto xvAl_;
        }
        goto OO5Gn;
        cPq5R:
        echo json_encode($noPay);
        goto mDnM4;
        jWX1M:
        echo json_encode($finishPay);
        goto AbbFT;
        zhvtb:
        global $_W, $_GPC;
        goto F_bKA;
        Q5zO4:
        $res = pdo_fetchall($sql);
        goto eIk0V;
        OoShu:
        $sql3 = "SELECT t.id,t2.goods_id,t2.pre_type,t.good_img,t.state,t.good_num,t.order_num,t.money,t.good_name FROM ims_ymktv_sun_order t INNER JOIN (SELECT t1.id AS goods_id,t1.pre_type FROM ims_ymktv_sun_goods t1 ) AS t2 ON t2.goods_id = t.good_id AND t.uniacid = " . $_W["uniacid"] . " AND t.user_id = " . $_GPC["user_id"] . " AND t.state = 2 and t.del = 2";
        goto SjlN3;
        sAZGN:
        goto R_lSV;
        goto UEFis;
        LTHqY:
    }
    public function doPageGetTeamWork()
    {
        goto NJDHb;
        SeI8V:
        echo json_encode($noPay);
        goto cB31l;
        PpKIF:
        $sql3 = "SELECT t.id,t2.goods_id,t2.pre_type,t.good_img,t.state,t.good_num,t.order_num,t.money,t.good_name FROM ims_ymktv_sun_order t INNER JOIN (SELECT t1.id AS goods_id,t1.pre_type FROM ims_ymktv_sun_goods t1 WHERE  t1.teamWork = 1) AS t2 ON t2.goods_id = t.good_id AND t.uniacid = " . $_W["uniacid"] . " AND t.user_id = " . $_GPC["user_id"] . " AND t.state = 2 and t.del = 2";
        goto LlFpB;
        mGWjh:
        goto AjITu;
        goto Y5LpM;
        ufYHl:
        $res = pdo_fetchall($sql);
        goto tK1G2;
        A6pUG:
        if ($_GPC["goId"] == 2) {
            goto HL3d7;
        }
        goto b4tih;
        b4tih:
        goto AjITu;
        goto mWXlj;
        tK1G2:
        echo json_encode($res);
        goto mGWjh;
        L9Ily:
        HL3d7:
        goto PpKIF;
        cB31l:
        goto AjITu;
        goto L9Ily;
        LlFpB:
        $finishPay = pdo_fetchall($sql3);
        goto LrwZT;
        K0npr:
        if ($_GPC["goId"] == 0) {
            goto aE8pk;
        }
        goto NMlLb;
        wyZT1:
        $noPay = pdo_fetchall($sql2);
        goto SeI8V;
        Y5LpM:
        SqGmi:
        goto lTfaz;
        CU6EZ:
        AjITu:
        goto P38YZ;
        lTfaz:
        $sql2 = "SELECT t.id,t2.goods_id,t2.pre_type,t.good_img,t.state,t.good_num,t.order_num,t.money,t.good_name FROM ims_ymktv_sun_order t INNER JOIN (SELECT t1.id AS goods_id,t1.pre_type FROM ims_ymktv_sun_goods t1 WHERE t1.teamWork = 1) AS t2 ON t2.goods_id = t.good_id AND t.uniacid = " . $_W["uniacid"] . " AND t.user_id = " . $_GPC["user_id"] . " AND t.state = 1 and t.del = 2";
        goto wyZT1;
        mWXlj:
        aE8pk:
        goto qFJqX;
        NMlLb:
        if ($_GPC["goId"] == 1) {
            goto SqGmi;
        }
        goto A6pUG;
        LrwZT:
        echo json_encode($finishPay);
        goto CU6EZ;
        qFJqX:
        $sql = "SELECT t.id,t2.goods_id,t2.pre_type,t.good_img,t.state,t.good_num,t.order_num,t.money,t.good_name FROM ims_ymktv_sun_order t INNER JOIN (SELECT t1.id AS goods_id,t1.pre_type FROM ims_ymktv_sun_goods t1 WHERE t1.teamWork = 1 ) AS t2 ON t2.goods_id = t.good_id AND t.uniacid = " . $_W["uniacid"] . " AND t.user_id = " . $_GPC["user_id"] . " and t.del = 2";
        goto ufYHl;
        NJDHb:
        global $_W, $_GPC;
        goto K0npr;
        P38YZ:
    }
    public function doPageGetTravel()
    {
        goto KUFY8;
        mlofo:
        echo json_encode($res);
        goto iQp3q;
        VVx5d:
        $res = pdo_fetchall($sql);
        goto mlofo;
        or62m:
        $sql = "SELECT t.good_img,t.good_name,t.start_date,t.back_date,t.id,t.good_num,t2.start_place,t2.end_place,t.money FROM ims_ymktv_sun_order t INNER JOIN (SELECT t1.id AS goods_id,t1.start_place,t1.end_place FROM ims_ymktv_sun_goods t1 ) AS t2 ON t.good_id = t2.goods_id AND t.uniacid = " . $_W["uniacid"] . " AND t.user_id = " . $_GPC["user_id"] . " AND t.state = 2 ORDER BY t.start_date desc";
        goto VVx5d;
        KUFY8:
        global $_W, $_GPC;
        goto or62m;
        iQp3q:
    }
    public function doPageDeleteOrder()
    {
        goto K8mdx;
        Z2ZZo:
        echo json_encode(array("code" => "fail"));
        goto gjOtZ;
        K8mdx:
        global $_W, $_GPC;
        goto PZ6ZS;
        QpqR7:
        echo json_encode(array("code" => "success"));
        goto le15b;
        qtCQG:
        if ($res["state"] == 2) {
            goto qMqQy;
        }
        goto PUtLa;
        ENpZ1:
        pdo_update("ymktv_sun_order", $data, array("uniacid" => $_W["uniacid"], "user_id" => $_GPC["user_id"], "id" => $_GPC["order_id"]));
        goto QpqR7;
        le15b:
        goto CoWhI;
        goto Rh7eH;
        Rh7eH:
        qMqQy:
        goto Z2ZZo;
        PZ6ZS:
        $res = pdo_get("ymktv_sun_order", array("user_id" => $_GPC["user_id"], "uniacid" => $_W["uniacid"], "id" => $_GPC["order_id"]));
        goto qtCQG;
        PUtLa:
        $data = array("del" => 1);
        goto ENpZ1;
        gjOtZ:
        CoWhI:
        goto OunNf;
        OunNf:
    }
    public function doPageOrderInfo()
    {
        goto cQFNy;
        gWSyJ:
        echo json_encode($res);
        goto vbjkb;
        mrzPc:
        $sql = "select a.*,b.store_name from " . tablename("ymktv_sun_order") . " a" . " left join " . tablename("ymktv_sun_store") . " b on b.id=a.store_id  WHERE a.id=:id ";
        goto uw5dy;
        cQFNy:
        global $_W, $_GPC;
        goto mrzPc;
        uw5dy:
        $res = pdo_fetch($sql, array(":id" => $_GPC["order_id"]));
        goto gWSyJ;
        vbjkb:
    }
    public function doPageUpdAdd()
    {
        goto Awj_5;
        UorWl:
        $data["user_address"] = $_GPC["user_address"];
        goto QyvcL;
        fGtEl:
        w052f:
        goto a_QLm;
        vHFz7:
        echo "2";
        goto zWdz8;
        Awj_5:
        global $_W, $_GPC;
        goto a3bfd;
        a3bfd:
        $data["user_name"] = $_GPC["user_name"];
        goto W2umH;
        TTQdl:
        x_CsS:
        goto Dsb3H;
        QyvcL:
        $res = pdo_update("ymktv_sun_user", $data, array("id" => $_GPC["user_id"]));
        goto rNXqK;
        zWdz8:
        goto w052f;
        goto TTQdl;
        rNXqK:
        if ($res) {
            goto x_CsS;
        }
        goto vHFz7;
        Dsb3H:
        echo "1";
        goto fGtEl;
        W2umH:
        $data["user_tel"] = $_GPC["user_tel"];
        goto UorWl;
        a_QLm:
    }
    public function doPageStoreOrder()
    {
        goto yMlQ5;
        TP0uq:
        $sql = "select a.*,b.name,b.img from " . tablename("ymktv_sun_order") . " a" . " left join " . tablename("ymktv_sun_user") . " b on b.id=a.user_id  WHERE a.store_id=:store_id and a.del2=2";
        goto vURr0;
        yMlQ5:
        global $_W, $_GPC;
        goto TP0uq;
        CpCMQ:
        echo json_encode($res);
        goto F4v9C;
        vURr0:
        $res = pdo_fetchall($sql, array(":store_id" => $_GPC["store_id"]));
        goto CpCMQ;
        F4v9C:
    }
    public function doPageStoreOrderInfo()
    {
        goto AqW8j;
        I9DRy:
        echo json_encode($res);
        goto SM61e;
        AqW8j:
        global $_W, $_GPC;
        goto WOVZK;
        iPQw3:
        $res = pdo_fetch($sql, array(":order_id" => $_GPC["order_id"]));
        goto I9DRy;
        WOVZK:
        $sql = "select a.*,b.name,b.img from " . tablename("ymktv_sun_order") . " a" . " left join " . tablename("ymktv_sun_user") . " b on b.id=a.user_id  WHERE a.id=:order_id and a.del2=2";
        goto iPQw3;
        SM61e:
    }
    public function doPageTuOrder()
    {
        goto JBpmJ;
        j2GcZ:
        echo "1";
        goto JxLUE;
        nRQzN:
        g3YDs:
        goto j2GcZ;
        Iy0h3:
        $res = pdo_update("ymktv_sun_order", array("state" => 5), array("id" => $_GPC["order_id"]));
        goto JVlDw;
        JVlDw:
        if ($res) {
            goto g3YDs;
        }
        goto YhY1I;
        JBpmJ:
        global $_W, $_GPC;
        goto Iy0h3;
        JxLUE:
        SUiSn:
        goto JvQFO;
        Gka7I:
        goto SUiSn;
        goto nRQzN;
        YhY1I:
        echo "2";
        goto Gka7I;
        JvQFO:
    }
    public function doPageDistribution()
    {
        goto wTE0F;
        JWUdl:
        echo "1";
        goto mfOwR;
        wBrJA:
        if ($res) {
            goto BufPp;
        }
        goto LLmAN;
        mfOwR:
        LIAuj:
        goto UbU5F;
        oT6Gr:
        $data["user_tel"] = $_GPC["user_tel"];
        goto nezxa;
        xBFtv:
        $data["user_id"] = $_GPC["user_id"];
        goto va2PR;
        f6Ogc:
        $data["state"] = 1;
        goto hVRqW;
        nezxa:
        $data["time"] = time();
        goto f6Ogc;
        nIvQL:
        goto LIAuj;
        goto A32bt;
        hVRqW:
        $data["uniacid"] = $_W["uniacid"];
        goto kddYd;
        kddYd:
        $res = pdo_insert("ymktv_sun_distribution", $data);
        goto wBrJA;
        wTE0F:
        global $_W, $_GPC;
        goto b4MAh;
        A32bt:
        BufPp:
        goto JWUdl;
        va2PR:
        $data["user_name"] = $_GPC["user_name"];
        goto oT6Gr;
        LLmAN:
        echo "2";
        goto nIvQL;
        b4MAh:
        pdo_delete("ymktv_sun_distribution", array("user_id" => $_GPC["user_id"]));
        goto xBFtv;
        UbU5F:
    }
    public function doPageMyDistribution()
    {
        goto mLcsH;
        eTcvx:
        echo json_encode($res);
        goto bL3xu;
        DYR6G:
        $res = pdo_get("ymktv_sun_distribution", array("user_id" => $_GPC["user_id"]));
        goto eTcvx;
        mLcsH:
        global $_W, $_GPC;
        goto DYR6G;
        bL3xu:
    }
    public function doPageFxSet()
    {
        goto w7T1x;
        MqUS8:
        $res = pdo_get("ymktv_sun_fxset", array("uniacid" => $_W["uniacid"]));
        goto mPbGk;
        w7T1x:
        global $_W, $_GPC;
        goto MqUS8;
        mPbGk:
        echo json_encode($res);
        goto az_Ot;
        az_Ot:
    }
    public function doPageMySx()
    {
        goto SRfgQ;
        CJWU7:
        $sql = "select a.* ,b.name from " . tablename("ymktv_sun_fxuser") . " a" . " left join " . tablename("ymktv_sun_user") . " b on b.id=a.user_id   WHERE a.fx_user=:fx_user ";
        goto U7AU9;
        U7AU9:
        $res = pdo_fetch($sql, array(":fx_user" => $_GPC["user_id"]));
        goto oNQRS;
        oNQRS:
        echo json_encode($res);
        goto MSnft;
        SRfgQ:
        global $_W, $_GPC;
        goto CJWU7;
        MSnft:
    }
    public function doPageEarnings()
    {
        goto pDTsT;
        O4HTp:
        echo json_encode($res);
        goto sgBUC;
        wyokp:
        $res = pdo_fetchall($sql, array(":user_id" => $_GPC["user_id"]));
        goto O4HTp;
        pDTsT:
        global $_W, $_GPC;
        goto QZ0ML;
        QZ0ML:
        $sql = "select a.* ,b.name,b.img from " . tablename("ymktv_sun_earnings") . " a" . " left join " . tablename("ymktv_sun_user") . " b on b.id=a.son_id   WHERE a.user_id=:user_id order by id DESC";
        goto wyokp;
        sgBUC:
    }
    public function doPageMyCode()
    {
        goto gA6ar;
        gA6ar:
        global $_W, $_GPC;
        goto M3ZP9;
        ER8GH:
        echo getCoade($_GPC["user_id"]);
        goto xEZHH;
        M3ZP9:
        function getCoade($storeid)
        {
            goto EMFgI;
            mpcNJ:
            return $img;
            goto Yjy0L;
            u_207:
            $img = set_msg($storeid);
            goto grjWC;
            grjWC:
            $img = base64_encode($img);
            goto mpcNJ;
            aoYiU:
            function set_msg($storeid)
            {
                goto zEydE;
                mklb0:
                $url = "https://api.weixin.qq.com/wxa/getwxacodeunlimit?access_token=" . $access_token . '';
                goto maVBs;
                Smgia:
                curl_setopt($ch, CURLOPT_POST, 1);
                goto rGE8G;
                al016:
                $data = curl_exec($ch);
                goto yAURF;
                rGE8G:
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data2);
                goto al016;
                maVBs:
                $ch = curl_init();
                goto WbR7l;
                KhTr7:
                return $data;
                goto tOjOS;
                WbR7l:
                curl_setopt($ch, CURLOPT_URL, $url);
                goto aDEsO;
                m3zF0:
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                goto Smgia;
                yAURF:
                curl_close($ch);
                goto KhTr7;
                IzCSV:
                $data2 = json_encode($data2);
                goto mklb0;
                vfbpa:
                $data2 = array("scene" => $storeid, "width" => 400);
                goto IzCSV;
                zEydE:
                $access_token = getaccess_token();
                goto vfbpa;
                aDEsO:
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                goto m3zF0;
                tOjOS:
            }
            goto u_207;
            EMFgI:
              function getaccess_token()
            {
                goto R2HZx;
                p1oEc:
                $secret = $res["appsecret"];
                goto mD9wo;
                s9bOi:
                $appid = $res["appid"];
                goto p1oEc;
                mD9wo:
                $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=" . $appid . "&secret=" . $secret . '';
                goto vH05E;
                qzDOX:
                $res = pdo_get("ymktv_sun_system", array("uniacid" => $_W["uniacid"]));
                goto s9bOi;
                R2HZx:
                global $_W, $_GPC;
                goto qzDOX;
                fDJzo:
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                goto GBM5j;
                vH05E:
                $ch = curl_init();
                goto aE6S8;
                aE6S8:
                curl_setopt($ch, CURLOPT_URL, $url);
                goto Akw6e;
                sLvL2:
                curl_close($ch);
                goto cvtDg;
                Akw6e:
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                goto fDJzo;
                ZaWcr:
                return $data["access_token"];
                goto S1FVa;
                cvtDg:
                $data = json_decode($data, true);
                goto ZaWcr;
                GBM5j:
                $data = curl_exec($ch);
                goto sLvL2;
                S1FVa:
            }
            goto aoYiU;
            Yjy0L:
        }
        goto ER8GH;
        xEZHH:
    }
    public function doPageYjtx()
    {
        goto Okvgk;
        wPtC7:
        nwk4Z:
        goto k4Y7G;
        NeSGX:
        $data["tx_cost"] = $_GPC["tx_cost"];
        goto o0x2W;
        VrchG:
        $data["time"] = time();
        goto vkVnq;
        wG_m0:
        pdo_update("ymktv_sun_user", array("commission -=" => $_GPC["tx_cost"]), array("id" => $_GPC["user_id"]));
        goto dcfrV;
        nDKEg:
        $data["state"] = 1;
        goto VrchG;
        Okvgk:
        global $_W, $_GPC;
        goto knObk;
        eW2Jm:
        $data["account"] = $_GPC["account"];
        goto NeSGX;
        vkVnq:
        $data["uniacid"] = $_W["uniacid"];
        goto oODCO;
        AL_8e:
        goto nwk4Z;
        goto SAysB;
        izUBo:
        if ($res) {
            goto O_yTW;
        }
        goto H0ZET;
        ElQsJ:
        $data["user_name"] = $_GPC["user_name"];
        goto eW2Jm;
        H0ZET:
        echo "2";
        goto AL_8e;
        BKg9y:
        $data["type"] = $_GPC["type"];
        goto ElQsJ;
        dcfrV:
        echo "1";
        goto wPtC7;
        oODCO:
        $res = pdo_insert("ymktv_sun_commission_withdrawal", $data);
        goto izUBo;
        SAysB:
        O_yTW:
        goto wG_m0;
        o0x2W:
        $data["sj_cost"] = $_GPC["sj_cost"];
        goto nDKEg;
        knObk:
        $data["user_id"] = $_GPC["user_id"];
        goto BKg9y;
        k4Y7G:
    }
    public function doPageYjtxList()
    {
        goto FUoJW;
        FUoJW:
        global $_W, $_GPC;
        goto Xru2g;
        zS7io:
        echo json_encode($res);
        goto xMrMH;
        Xru2g:
        $res = pdo_getall("ymktv_sun_commission_withdrawal", array("user_id" => $_GPC["user_id"]), array(), '', "id DESC");
        goto zS7io;
        xMrMH:
    }
    public function doPageBinding()
    {
        goto CqLNY;
        app8b:
        $res3 = pdo_insert("ymktv_sun_fxuser", array("user_id" => $_GPC["user_id"], "fx_user" => $_GPC["fx_user"], "time" => time()));
        goto NfIzm;
        vfbqC:
        goto sOFAc;
        goto K1zPU;
        AqQHG:
        sOFAc:
        goto SgB4X;
        CLzp0:
        tj_Qi:
        goto M4q7G;
        ayZeS:
        $res2 = pdo_get("ymktv_sun_fxuser", array("user_id" => $_GPC["fx_user"], "fx_user" => $_GPC["user_id"]));
        goto TCIYO;
        CqLNY:
        global $_W, $_GPC;
        goto iqYDN;
        K1zPU:
        qJbKO:
        goto FViQU;
        TCIYO:
        if (!($set["is_open"] == 1)) {
            goto V0WaG;
        }
        goto hnSci;
        M4q7G:
        echo "自己不能绑定自己";
        goto vfbqC;
        NfIzm:
        if ($res3) {
            goto dXLoQ;
        }
        goto yVTRe;
        sBlkY:
        goto sOFAc;
        goto CLzp0;
        Tj4aV:
        K0vwC:
        goto sBlkY;
        hnSci:
        if ($_GPC["user_id"] == $_GPC["fx_user"]) {
            goto tj_Qi;
        }
        goto QnjAT;
        iqYDN:
        $set = pdo_get("ymktv_sun_fxset", array("uniacid" => $_W["uniacid"]));
        goto NRa2J;
        jeJ_1:
        dXLoQ:
        goto bw1Rv;
        FViQU:
        echo "不能重复绑定";
        goto AqQHG;
        yVTRe:
        echo "2";
        goto ve7wj;
        ve7wj:
        goto K0vwC;
        goto jeJ_1;
        QnjAT:
        if ($res || $res2) {
            goto qJbKO;
        }
        goto app8b;
        bw1Rv:
        echo "1";
        goto Tj4aV;
        SgB4X:
        V0WaG:
        goto j1_tL;
        NRa2J:
        $res = pdo_get("ymktv_sun_fxuser", array("fx_user" => $_GPC["fx_user"]));
        goto ayZeS;
        j1_tL:
    }
    public function doPageMyTeam()
    {
        goto b04L2;
        LBYYD:
        $j++;
        goto jbHf3;
        MVuki:
        $res2[] = $res3;
        goto M2Rfv;
        PAaB5:
        YW0Si:
        goto Oj7NA;
        cfOvM:
        if (!($k < count($res2))) {
            goto aTZMU;
        }
        goto Jy4TR;
        fqnb9:
        $res4[] = $res2[$k][$j];
        goto zhQQw;
        aIJI6:
        $sql2 = "select a.* ,b.name,b.img from " . tablename("ymktv_sun_fxuser") . " a" . " left join " . tablename("ymktv_sun_user") . " b on b.id=a.fx_user   WHERE a.user_id=:user_id order by id DESC";
        goto arM9E;
        TmOB1:
        $data["two"] = $res4;
        goto cVhNB;
        JL9nG:
        $res4 = array();
        goto tDofJ;
        vCfdI:
        RdI50:
        goto JL9nG;
        I0JSc:
        $sql = "select a.* ,b.name,b.img from " . tablename("ymktv_sun_fxuser") . " a" . " left join " . tablename("ymktv_sun_user") . " b on b.id=a.fx_user   WHERE a.user_id=:user_id order by id DESC";
        goto uawaI;
        NfnnV:
        CJ_YP:
        goto oYjUy;
        b04L2:
        global $_W, $_GPC;
        goto I0JSc;
        rt9UR:
        goto D2AIa;
        goto vCfdI;
        Pa_Tu:
        if (!($i < count($res))) {
            goto RdI50;
        }
        goto aIJI6;
        uawaI:
        $res = pdo_fetchall($sql, array(":user_id" => $_GPC["user_id"]));
        goto hG9uS;
        g4d94:
        $i++;
        goto rt9UR;
        zhQQw:
        oOoFl:
        goto LBYYD;
        aCI22:
        $data["one"] = $res;
        goto TmOB1;
        qwvQp:
        D2AIa:
        goto Pa_Tu;
        Oj7NA:
        h37tj:
        goto Zva5M;
        GcFOh:
        goto qWVsl;
        goto aztaV;
        arM9E:
        $res3 = pdo_fetchall($sql2, array(":user_id" => $res[$i]["fx_user"]));
        goto MVuki;
        M2Rfv:
        dHnAS:
        goto g4d94;
        cVhNB:
        echo json_encode($data);
        goto Xjd0u;
        kSOAN:
        $i = 0;
        goto qwvQp;
        jbHf3:
        goto CJ_YP;
        goto PAaB5;
        E1NQh:
        qWVsl:
        goto cfOvM;
        oYjUy:
        if (!($j < count($res2[$k]))) {
            goto YW0Si;
        }
        goto fqnb9;
        tDofJ:
        $k = 0;
        goto E1NQh;
        aztaV:
        aTZMU:
        goto aCI22;
        hG9uS:
        $res2 = array();
        goto kSOAN;
        Jy4TR:
        $j = 0;
        goto NfnnV;
        Zva5M:
        $k++;
        goto GcFOh;
        Xjd0u:
    }
    public function doPageMyCommission()
    {
        goto SfiZc;
        H4JrI:
        goto j4llo;
        goto zxTHs;
        XNB6q:
        $system = pdo_get("ymktv_sun_fxset", array("uniacid" => $_W["uniacid"]));
        goto oxAfV;
        aOyzg:
        $data["sq"] = $sq;
        goto nFvAq;
        oViPX:
        $sq = pdo_fetch($sq);
        goto j8hdJ;
        FSzm_:
        $cg = pdo_fetch($cg);
        goto OQjAw;
        ISKAj:
        $cg = "select sum(tx_cost) as tx_cost from " . tablename("ymktv_sun_commission_withdrawal") . " WHERE  state=2 and user_id=" . $_GPC["user_id"];
        goto FSzm_;
        nFvAq:
        $data["cg"] = $cg;
        goto qH4Yc;
        ZnQcN:
        j4llo:
        goto rFzCl;
        zxTHs:
        vrSbe:
        goto pwRJQ;
        OQjAw:
        $cg = $cg["tx_cost"];
        goto LCxtf;
        LCxtf:
        $lei = "select sum(money) as tx_cost from " . tablename("ymktv_sun_earnings") . " WHERE  user_id=" . $_GPC["user_id"];
        goto dM59h;
        rFzCl:
        $sq = "select sum(tx_cost) as tx_cost from " . tablename("ymktv_sun_commission_withdrawal") . " WHERE  user_id=" . $_GPC["user_id"];
        goto oViPX;
        uxQZ0:
        echo json_encode($data);
        goto A7yoF;
        j8hdJ:
        $sq = $sq["tx_cost"];
        goto ISKAj;
        pwRJQ:
        $ke = 0.0;
        goto ZnQcN;
        qH4Yc:
        $data["lei"] = $lei;
        goto uxQZ0;
        H8jzd:
        $lei = $lei["tx_cost"];
        goto UklBw;
        SfiZc:
        global $_W, $_GPC;
        goto XNB6q;
        UklBw:
        $data["ke"] = $ke;
        goto aOyzg;
        oxAfV:
        $user = pdo_get("ymktv_sun_user", array("id" => $_GPC["user_id"]));
        goto RdrdO;
        RdrdO:
        if ($user["commission"] < $system["tx_money"]) {
            goto vrSbe;
        }
        goto twc6K;
        twc6K:
        $ke = $user["commission"];
        goto H4JrI;
        dM59h:
        $lei = pdo_fetch($lei);
        goto H8jzd;
        A7yoF:
    }
    public function doPageFx()
    {
        goto SaVSV;
        dXgZB:
        g5lpp:
        goto UIFJu;
        C8uMG:
        $data6["money"] = $money;
        goto ZiHYx;
        fT6eg:
        $data6["uniacid"] = $_W["uniacid"];
        goto qUcrr;
        To431:
        $data7["son_id"] = $_GPC["user_id"];
        goto Xa3YA;
        ErjRN:
        pdo_update("ymktv_sun_user", array("commission +=" => $money), array("id" => $userid2));
        goto pDdZj;
        pDdZj:
        $data7["user_id"] = $userid2;
        goto To431;
        AIg3T:
        $money = $_GPC["money"] * ($set["commission"] / 100);
        goto ZOnCs;
        PcnJY:
        LHEh6:
        goto ByiPc;
        DXLJt:
        $data6["son_id"] = $_GPC["user_id"];
        goto C8uMG;
        Vndk3:
        pdo_insert("ymktv_sun_earnings", $data6);
        goto J5roH;
        ZOnCs:
        pdo_update("ymktv_sun_user", array("commission +=" => $money), array("id" => $userid));
        goto swAsE;
        FahT3:
        $userid2 = $user2["user_id"];
        goto NHY7O;
        BdVni:
        $user = pdo_get("ymktv_sun_fxuser", array("fx_user" => $_GPC["user_id"]));
        goto tThhp;
        jvgb7:
        $data6["time"] = time();
        goto aoFtf;
        DwmXd:
        $data7["uniacid"] = $_W["uniacid"];
        goto CoM0_;
        ioT25:
        rBHkB:
        goto BdVni;
        l9l7g:
        $data7["time"] = time();
        goto DwmXd;
        UIFJu:
        if (!$user2) {
            goto Rreuu;
        }
        goto FahT3;
        EGLKC:
        if (!($set["is_open"] == 1)) {
            goto LHEh6;
        }
        goto xVmhD;
        SaVSV:
        global $_W, $_GPC;
        goto cgVQ1;
        BCHXy:
        $userid = $user["user_id"];
        goto AIg3T;
        tThhp:
        if (!$user) {
            goto r0ALG;
        }
        goto T7aQC;
        S9WTp:
        if (!$user) {
            goto g5lpp;
        }
        goto BCHXy;
        spv0q:
        goto B788Q;
        goto ioT25;
        T7aQC:
        $userid = $user["user_id"];
        goto awh7F;
        ZiHYx:
        $data6["time"] = time();
        goto fT6eg;
        dXnr4:
        $user2 = pdo_get("ymktv_sun_fxuser", array("fx_user" => $user["user_id"]));
        goto S9WTp;
        J5roH:
        r0ALG:
        goto rboxP;
        aoFtf:
        $data6["uniacid"] = $_W["uniacid"];
        goto Vndk3;
        qUcrr:
        pdo_insert("ymktv_sun_earnings", $data6);
        goto dXgZB;
        sIb2o:
        $data6["son_id"] = $_GPC["user_id"];
        goto Of0hw;
        swAsE:
        $data6["user_id"] = $userid;
        goto DXLJt;
        xVmhD:
        if ($set["is_ej"] == 2) {
            goto rBHkB;
        }
        goto KHe4y;
        KHe4y:
        $user = pdo_get("ymktv_sun_fxuser", array("fx_user" => $_GPC["user_id"]));
        goto dXnr4;
        Of0hw:
        $data6["money"] = $money;
        goto jvgb7;
        rXdbZ:
        $data6["user_id"] = $userid;
        goto sIb2o;
        Xa3YA:
        $data7["money"] = $money;
        goto l9l7g;
        awh7F:
        $money = $_GPC["money"] * ($set["commission"] / 100);
        goto lAzRm;
        CoM0_:
        pdo_insert("ymktv_sun_earnings", $data7);
        goto Uws48;
        NHY7O:
        $money = $_GPC["money"] * ($set["commission2"] / 100);
        goto ErjRN;
        Uws48:
        Rreuu:
        goto spv0q;
        lAzRm:
        pdo_update("ymktv_sun_user", array("commission +=" => $money), array("id" => $userid));
        goto rXdbZ;
        rboxP:
        B788Q:
        goto PcnJY;
        cgVQ1:
        $set = pdo_get("ymktv_sun_fxset", array("uniacid" => $_W["uniacid"]));
        goto EGLKC;
        ByiPc:
    }
    public function doPageYellowPage()
    {
        goto CgwSc;
        CgwSc:
        global $_W, $_GPC;
        goto RlBQN;
        ZjLLy:
        PxR4r:
        goto C4lec;
        P1muf:
        $data["cityname"] = $_GPC["cityname"];
        goto NI0Xa;
        kSncI:
        goto wD7eK;
        goto nfi9b;
        kEDlA:
        xB3oa:
        goto bmYm_;
        Da2XQ:
        $hy_id = pdo_insertid();
        goto jEJxB;
        NI0Xa:
        $data["uniacid"] = $_W["uniacid"];
        goto mkUjr;
        HRVGv:
        $data["content"] = $_GPC["content"];
        goto DjO4e;
        e0mLr:
        $res = pdo_insert("ymktv_sun_yellowstore", $data);
        goto Da2XQ;
        nfqBr:
        $data["tel2"] = $_GPC["tel2"];
        goto P1muf;
        zzKTq:
        if ($system["is_hyset"] == 1) {
            goto lav4_;
        }
        goto ztdLr;
        nfi9b:
        lav4_:
        goto X3WWu;
        k4xii:
        $data["sh_time"] = time();
        goto kSncI;
        jEJxB:
        if ($res) {
            goto PxR4r;
        }
        goto XgrLa;
        ztdLr:
        $data["state"] = 2;
        goto k4xii;
        X3WWu:
        $data["state"] = 1;
        goto uXJpp;
        giM5W:
        $data["rz_type"] = $_GPC["rz_type"];
        goto O3gzR;
        mkUjr:
        $data["time_over"] = 2;
        goto zzKTq;
        RlBQN:
        $system = pdo_get("ymktv_sun_system", array("uniacid" => $_W["uniacid"]));
        goto ANAdn;
        Qix2L:
        $data["logo"] = $_GPC["logo"];
        goto NZzX4;
        DjO4e:
        $data["imgs"] = $_GPC["imgs"];
        goto nfqBr;
        O3gzR:
        $data["coordinates"] = $_GPC["coordinates"];
        goto HRVGv;
        OfuFx:
        $data["link_tel"] = $_GPC["link_tel"];
        goto giM5W;
        LHtnS:
        $data["type_id"] = $_GPC["type_id"];
        goto OfuFx;
        NZzX4:
        $data["company_name"] = $_GPC["company_name"];
        goto zH1Tz;
        cQ717:
        goto xB3oa;
        goto ZjLLy;
        C4lec:
        echo $hy_id;
        goto kEDlA;
        zH1Tz:
        $data["company_address"] = $_GPC["company_address"];
        goto LHtnS;
        XgrLa:
        echo "2";
        goto cQ717;
        uXJpp:
        wD7eK:
        goto e0mLr;
        ANAdn:
        $data["user_id"] = $_GPC["user_id"];
        goto Qix2L;
        bmYm_:
    }
    public function doPageMyYellowPage()
    {
        goto luapy;
        v5jcI:
        $res = pdo_fetchall($sql, array(":user_id" => $_GPC["user_id"]));
        goto G9CoB;
        sc1I_:
        $sql = "select a.* ,b.type_name from " . tablename("ymktv_sun_yellowstore") . " a" . " left join " . tablename("ymktv_sun_storetype") . " b on b.id=a.type_id   WHERE a.user_id=:user_id order by a.id desc ";
        goto v5jcI;
        G9CoB:
        echo json_encode($res);
        goto ZUG1i;
        luapy:
        global $_W, $_GPC;
        goto sc1I_;
        ZUG1i:
    }
    public function doPageYellowPageList()
    {
        goto XuYJp;
        B6OdO:
        if (!$_GPC["keywords"]) {
            goto z5AIl;
        }
        goto YWsLg;
        eRS4b:
        $list = pdo_getall("ymktv_sun_yellowstore", array("uniacid" => $_W["uniacid"], "state" => 2));
        goto dxfGF;
        h5zNL:
        $sql = "select a.* ,b.type_name from " . tablename("ymktv_sun_yellowstore") . " a" . " left join " . tablename("ymktv_sun_storetype") . " b on b.id=a.type_id " . $where . " order by id DESC";
        goto OAhVM;
        OAhVM:
        $select_sql = $sql . " LIMIT " . ($pageindex - 1) * $pagesize . "," . $pagesize;
        goto r7yKN;
        KTNNy:
        $where .= " and a.cityname LIKE  concat('%', :name,'%') ";
        goto C92OR;
        YWsLg:
        $where .= " and a.company_name LIKE  concat('%', :name,'%') ";
        goto MF2u2;
        ZPkDJ:
        $rst = pdo_update("ymktv_sun_yellowstore", array("time_over" => 1), array("dq_time <=" => time(), "state" => 2));
        goto z25wm;
        zvlVL:
        echo json_encode($res);
        goto bTl31;
        r7yKN:
        $res = pdo_fetchall($select_sql, $data);
        goto zvlVL;
        tI4a5:
        z5AIl:
        goto gDiKu;
        z25wm:
        $pageindex = max(1, intval($_GPC["page"]));
        goto CX2lP;
        C92OR:
        $data[":name"] = $_GPC["cityname"];
        goto ayAwl;
        gDiKu:
        $data[":uniacid"] = $_W["uniacid"];
        goto h5zNL;
        ayAwl:
        jMWVD:
        goto B6OdO;
        MF2u2:
        $data[":name"] = $_GPC["keywords"];
        goto tI4a5;
        mbPY7:
        bynmL:
        goto ZPkDJ;
        GMNYZ:
        $where = " WHERE a.uniacid=:uniacid and a.state=2 and a.time_over=2 ";
        goto pT5Yk;
        pT5Yk:
        if (!$_GPC["cityname"]) {
            goto jMWVD;
        }
        goto KTNNy;
        XuYJp:
        global $_W, $_GPC;
        goto eRS4b;
        dxfGF:
        foreach ($list as $v) {
            goto zyZCO;
            zEhPs:
            LIk5W:
            goto kOQ2Z;
            LsZ3A:
            pdo_update("ymktv_sun_yellowstore", array("dq_time" => $v["sh_time"] + $set["days"] * 24 * 60 * 60), array("id" => $v["id"]));
            goto zEhPs;
            zyZCO:
            $set = pdo_get("ymktv_sun_yellowset", array("id" => $v["rz_type"]));
            goto LsZ3A;
            kOQ2Z:
        }
        goto mbPY7;
        CX2lP:
        $pagesize = 10;
        goto GMNYZ;
        bTl31:
    }
    public function doPageYellowPageInfo()
    {
        goto oGxhg;
        s4lVt:
        pdo_update("ymktv_sun_yellowstore", array("views +=" => 1), array("id" => $_GPC["id"]));
        goto jIWYt;
        jIWYt:
        $sql = "select a.* ,b.type_name from " . tablename("ymktv_sun_yellowstore") . " a" . " left join " . tablename("ymktv_sun_storetype") . " b on b.id=a.type_id   WHERE a.id=:id";
        goto r2an2;
        r2an2:
        $res = pdo_fetch($sql, array(":id" => $_GPC["id"]));
        goto Csdao;
        Csdao:
        echo json_encode($res);
        goto ZqUSZ;
        oGxhg:
        global $_W, $_GPC;
        goto s4lVt;
        ZqUSZ:
    }
    public function doPageYellowSet()
    {
        goto Nk0qu;
        TqFjE:
        echo json_encode($res);
        goto RD2B0;
        Nk0qu:
        global $_W, $_GPC;
        goto jSOh6;
        jSOh6:
        $res = pdo_getall("ymktv_sun_yellowset", array("uniacid" => $_W["uniacid"]), array(), '', "num asc");
        goto TqFjE;
        RD2B0:
    }
    public function doPageStoreLogin()
    {
        goto uL41F;
        pgHJ3:
        $res = pdo_get("ymktv_sun_store", array("user_name" => $_GPC["user_name"]));
        goto h9lRc;
        Afx7N:
        if (!$res) {
            goto RXvxk;
        }
        goto GvKXc;
        IOU_M:
        m7NJ7:
        goto ErzYl;
        EWSqS:
        if ($res2) {
            goto hMaXd;
        }
        goto ATRDG;
        h9lRc:
        $res2 = pdo_get("ymktv_sun_store", array("user_name" => $_GPC["user_name"], "pwd" => md5($_GPC["pwd"])));
        goto Afx7N;
        LqkcZ:
        goto m7NJ7;
        goto bg_Gi;
        kDqmO:
        echo "账号不存在!";
        goto QPtIW;
        QKXQU:
        RXvxk:
        goto kDqmO;
        uL41F:
        global $_W, $_GPC;
        goto pgHJ3;
        Fp8Gl:
        echo "密码不正确!";
        goto LqkcZ;
        bg_Gi:
        hMaXd:
        goto T2W3I;
        ATRDG:
        goto m7NJ7;
        goto QKXQU;
        Y93l7:
        KwpFD:
        goto Fp8Gl;
        GvKXc:
        if (!$res2) {
            goto KwpFD;
        }
        goto EWSqS;
        T2W3I:
        echo json_encode($res2);
        goto IOU_M;
        QPtIW:
        goto m7NJ7;
        goto Y93l7;
        ErzYl:
    }
    public function doPageUpload()
    {
        goto c07Cv;
        igRUe:
        echo "文件类型不符!" . $file["type"];
        goto Zrarj;
        O8z8m:
        UfpiI:
        goto Amx5B;
        MuYlS:
        u55iE:
        goto hsscT;
        qezlE:
        exit;
        goto ZPaTC;
        pN3IR:
        $red = imagecolorallocate($nimage, 255, 0, 0);
        goto dHI48;
        dg06V:
        $black = imagecolorallocate($nimage, 0, 0, 0);
        goto pN3IR;
        T6ATw:
        $white = imagecolorallocate($nimage, 255, 255, 255);
        goto dg06V;
        OD42I:
        if (!($max_file_size < $file["size"])) {
            goto xNbpO;
        }
        goto b6Frk;
        M8xqy:
        F0eTS:
        goto HjrQ4;
        DBgt2:
        echo "移动文件出错";
        goto qezlE;
        r38kD:
        @($filename = $fname);
        goto neDMX;
        cfXmi:
        switch ($iinfo[2]) {
            case 1:
                $simage = imagecreatefromgif($destination);
                goto z3eB5;
            case 2:
                $simage = imagecreatefromjpeg($destination);
                goto z3eB5;
            case 3:
                $simage = imagecreatefrompng($destination);
                goto z3eB5;
            case 6:
                $simage = imagecreatefromwbmp($destination);
                goto z3eB5;
            default:
                die("不支持的文件类型");
                exit;
        }
        goto PYsDR;
        zT1m_:
        $max_file_size = 2000000;
        goto cvRdu;
        PFtj6:
        if (in_array($file["type"], $uptypes)) {
            goto UfpiI;
        }
        goto igRUe;
        j1_qz:
        $waterstring = "666666";
        goto i2rWd;
        sH23J:
        $fname = $pinfo["basename"];
        goto ipBVy;
        cvRdu:
        $destination_folder = "../attachment/";
        goto rAQof;
        J2kTY:
        if (move_uploaded_file($filename, $destination)) {
            goto bNshA;
        }
        goto DBgt2;
        Dl3QB:
        xNbpO:
        goto PFtj6;
        bRI6K:
        $file = $_FILES["upfile"];
        goto OD42I;
        kMG6Q:
        FN4HU:
        goto p67SX;
        eGmOe:
        z3eB5:
        goto xkqKb;
        Zrarj:
        exit;
        goto O8z8m;
        FTT6P:
        $iinfo = getimagesize($destination, $iinfo);
        goto KDBTF;
        Gay3w:
        jnJff:
        goto bRI6K;
        oX46L:
        vPf0M:
        goto J2kTY;
        HQ_3t:
        $pinfo = pathinfo($file["name"]);
        goto dtFdO;
        HjrQ4:
        XOqqN:
        goto wpeI_;
        p67SX:
        echo $fname;
        goto kl0o1;
        cDjRh:
        B2CGS:
        goto MuYlS;
        kjsfg:
        imagedestroy($simage);
        goto kMG6Q;
        c07Cv:
        $uptypes = array("image/jpg", "image/jpeg", "image/png", "image/pjpeg", "image/gif", "image/bmp", "image/x-png");
        goto zT1m_;
        l3H0d:
        $imgpreviewsize = 1 / 2;
        goto wD0es;
        dHI48:
        imagefill($nimage, 0, 0, $white);
        goto cfXmi;
        WanLl:
        $filename = $file["tmp_name"];
        goto MgGOy;
        i2rWd:
        $imgpreview = 1;
        goto l3H0d;
        wD0es:
        if (is_uploaded_file($_FILES["upfile"]["tmp_name"])) {
            goto jnJff;
        }
        goto m6XKe;
        m6XKe:
        echo "图片不存在!";
        goto rJo8r;
        ipBVy:
        if (!($watermark == 1)) {
            goto FN4HU;
        }
        goto FTT6P;
        U47qN:
        echo "同名文件已经存在了";
        goto R_hqE;
        qqzdy:
        imagefilledrectangle($nimage, 1, $image_size[1] - 15, 80, $image_size[1], $white);
        goto WBDiW;
        y2GUc:
        exit;
        goto Dl3QB;
        Pr2x3:
        mkdir($destination_folder);
        goto v501e;
        kl0o1:
        @(require_once IA_ROOT . "/framework/function/file.func.php");
        goto r38kD;
        KDBTF:
        $nimage = imagecreatetruecolor($image_size[0], $image_size[1]);
        goto T6ATw;
        wDnP3:
        $waterposition = 1;
        goto j1_qz;
        R_hqE:
        exit;
        goto oX46L;
        dtFdO:
        $ftype = $pinfo["extension"];
        goto OqIp0;
        xkqKb:
        imagecopy($nimage, $simage, 0, 0, 0, 0, $image_size[0], $image_size[1]);
        goto qqzdy;
        ZPaTC:
        bNshA:
        goto e1yre;
        kF2MT:
        $watertype = 1;
        goto wDnP3;
        Amx5B:
        if (file_exists($destination_folder)) {
            goto i01Ce;
        }
        goto Pr2x3;
        WBDiW:
        switch ($watertype) {
            case 1:
                imagestring($nimage, 2, 3, $image_size[1] - 15, $waterstring, $black);
                goto u55iE;
            case 2:
                goto IU9pF;
                dmXpj:
                imagedestroy($simage1);
                goto e1S6e;
                IU9pF:
                $simage1 = imagecreatefromgif("xplore.gif");
                goto TRCOm;
                e1S6e:
                goto u55iE;
                goto AhbCy;
                TRCOm:
                imagecopy($nimage, $simage1, 0, 0, 0, 0, 85, 15);
                goto dmXpj;
                AhbCy:
        }
        goto cDjRh;
        OqIp0:
        $destination = $destination_folder . str_shuffle(time() . rand(111111, 999999)) . "." . $ftype;
        goto FigHc;
        FigHc:
        if (!(file_exists($destination) && $overwrite != true)) {
            goto vPf0M;
        }
        goto U47qN;
        PYsDR:
        qC1P_:
        goto eGmOe;
        b6Frk:
        echo "文件太大!";
        goto y2GUc;
        hsscT:
        switch ($iinfo[2]) {
            case 1:
                imagejpeg($nimage, $destination);
                goto XOqqN;
            case 2:
                imagejpeg($nimage, $destination);
                goto XOqqN;
            case 3:
                imagepng($nimage, $destination);
                goto XOqqN;
            case 6:
                imagewbmp($nimage, $destination);
                goto XOqqN;
        }
        goto M8xqy;
        neDMX:
        @file_remote_upload($filename);
        goto v3zPr;
        MgGOy:
        $image_size = getimagesize($filename);
        goto HQ_3t;
        e1yre:
        $pinfo = pathinfo($destination);
        goto sH23J;
        wpeI_:
        imagedestroy($nimage);
        goto kjsfg;
        rAQof:
        $watermark = 2;
        goto kF2MT;
        v501e:
        i01Ce:
        goto WanLl;
        rJo8r:
        exit;
        goto Gay3w;
        v3zPr:
    }
    public function doPageTxMessage()
    {
        goto I4hGJ;
        c6K_p:
        function getaccess_token($_W)
        {
            goto qhuQd;
            bg2dy:
            curl_setopt($ch, CURLOPT_URL, $url);
            goto uVVb9;
            zJtyS:
            $secret = $res["appsecret"];
            goto CejK1;
            uVVb9:
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            goto ezDpA;
            J3obi:
            curl_close($ch);
            goto QBvUF;
            CejK1:
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=" . $appid . "&secret=" . $secret . '';
            goto PcOV2;
            Oqqq8:
            $appid = $res["appid"];
            goto zJtyS;
            PcOV2:
            $ch = curl_init();
            goto bg2dy;
            QBvUF:
            $data = json_decode($data, true);
            goto hIXEH;
            ezDpA:
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            goto Te7kX;
            Te7kX:
            $data = curl_exec($ch);
            goto J3obi;
            qhuQd:
            $res = pdo_get("ymktv_sun_system", array("uniacid" => $_W["uniacid"]));
            goto Oqqq8;
            hIXEH:
            return $data["access_token"];
            goto Raamt;
            Raamt:
        }
        goto PycFY;
        PycFY:
        function set_msg($_W, $_GPC)
        {
            goto BeCco;
            vXyBv:
            if (!($tx["type"] == 2)) {
                goto i8nN3;
            }
            goto F1XXT;
            X9_CZ:
            curl_setopt($ch, CURLOPT_POST, 1);
            goto ULFDr;
            wYs2S:
            eMejt:
            goto vXyBv;
            KpITd:
            i8nN3:
            goto lOfOX;
            ZDngg:
            ecF0m:
            goto DhO0t;
            eFpnc:
            $res = pdo_get("ymktv_sun_sms", array("uniacid" => $_W["uniacid"]));
            goto Sirjr;
            lOfOX:
            if (!($tx["type"] == 3)) {
                goto ecF0m;
            }
            goto NDNJn;
            BeCco:
            $access_token = getaccess_token($_W);
            goto eFpnc;
            tJH9K:
            if (!($tx["type"] == 1)) {
                goto eMejt;
            }
            goto Vufgj;
            sKeXm:
            $url = "https://api.weixin.qq.com/cgi-bin/message/wxopen/template/send?access_token=" . $access_token . '';
            goto g3P6e;
            jYbZt:
            curl_close($ch);
            goto jKqgS;
            jKqgS:
            return $data;
            goto qnD_z;
            NDNJn:
            $typename = "银行卡";
            goto ZDngg;
            Vufgj:
            $typename = "支付宝";
            goto wYs2S;
            F1XXT:
            $typename = "微信";
            goto KpITd;
            W5wF6:
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            goto X9_CZ;
            ULFDr:
            curl_setopt($ch, CURLOPT_POSTFIELDS, $formwork);
            goto RqIh0;
            Sirjr:
            $tx = pdo_get("ymktv_sun_withdrawal", array("id" => $_GPC["txsh_id"]));
            goto tJH9K;
            DhO0t:
            $time = date("Y-m-d H:i:s", $tx["time"]);
            goto w2JEP;
            g3P6e:
            $ch = curl_init();
            goto VrJD3;
            VrJD3:
            curl_setopt($ch, CURLOPT_URL, $url);
            goto qgVO3;
            qgVO3:
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            goto W5wF6;
            w2JEP:
            $formwork = "{\n     \"touser\": \"" . $_GET["openid"] . "\",\n     \"template_id\": \"" . $res["tid2"] . "\",\n     \"page\":\"ymktv_sun/pages/index/index\",\n     \"form_id\":\"" . $_GET["form_id"] . "\",\n     \"data\": {\n       \"keyword1\": {\n         \"value\": \"" . $tx["name"] . "\",\n         \"color\": \"#173177\"\n       },\n       \"keyword2\": {\n         \"value\":\"" . $tx["username"] . "\",\n         \"color\": \"#173177\"\n       },\n       \"keyword3\": {\n         \"value\": \"" . $tx["tx_cost"] . "\",\n         \"color\": \"#173177\"\n       },\n       \"keyword4\": {\n         \"value\": \"" . $tx["sj_cost"] . "\",\n         \"color\": \"#173177\"\n       },\n       \"keyword5\": {\n         \"value\":  \"" . $typename . "\",\n         \"color\": \"#173177\"\n       },\n        \"keyword6\": {\n         \"value\":  \"" . $time . "\",\n         \"color\": \"#173177\"\n       }\n     }   \n   }";
            goto sKeXm;
            RqIh0:
            $data = curl_exec($ch);
            goto jYbZt;
            qnD_z:
        }
        goto cmX7x;
        I4hGJ:
        global $_W, $_GPC;
        goto c6K_p;
        cmX7x:
        echo set_msg($_W, $_GPC);
        goto pQkCf;
        pQkCf:
    }
    public function doPageRzMessage()
    {
        goto HmsXo;
        tKAGA:
        echo set_msg($_W, $_GPC);
        goto LUo5x;
        HmsXo:
        global $_W, $_GPC;
        goto HlYj9;
        U4giF:
        function set_msg($_W, $_GPC)
        {
            goto CEIS3;
            QKDX9:
            $res = pdo_fetch($sql, array(":store_id" => $_GPC["store_id"]));
            goto scEA2;
            scEA2:
            $type = "待审核";
            goto xq12_;
            UHHLo:
            curl_setopt($ch, CURLOPT_URL, $url);
            goto OV1IM;
            e2MUb:
            $ch = curl_init();
            goto UHHLo;
            CEIS3:
            $access_token = getaccess_token($_W);
            goto ussCS;
            vTmA_:
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            goto xEBhd;
            ussCS:
            $res2 = pdo_get("ymktv_sun_sms", array("uniacid" => $_W["uniacid"]));
            goto K5_J1;
            Hjcrv:
            return $data;
            goto AdVR2;
            eSfTu:
            curl_setopt($ch, CURLOPT_POSTFIELDS, $formwork);
            goto Wj15C;
            xq12_:
            $note = "1-3日完成审核";
            goto V96qv;
            OV1IM:
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            goto vTmA_;
            V96qv:
            $formwork = "{\n     \"touser\": \"" . $_GET["openid"] . "\",\n     \"template_id\": \"" . $res2["tid1"] . "\",\n     \"page\":\"ymktv_sun/pages/index/index\",\n     \"form_id\":\"" . $_GET["form_id"] . "\",\n     \"data\": {\n       \"keyword1\": {\n         \"value\": \"" . $res["store_name"] . "\",\n         \"color\": \"#173177\"\n       },\n       \"keyword2\": {\n         \"value\":\"" . $res["user_name"] . "\",\n         \"color\": \"#173177\"\n       },\n       \"keyword3\": {\n         \"value\": \"" . $res["time"] . "\",\n         \"color\": \"#173177\"\n       },\n       \"keyword4\": {\n         \"value\": \"" . $type . "\",\n         \"color\": \"#173177\"\n       },\n       \"keyword5\": {\n         \"value\":  \"" . $note . "\",\n         \"color\": \"#173177\"\n       }\n     }   \n   }";
            goto HY0we;
            qpoHO:
            curl_close($ch);
            goto Hjcrv;
            xEBhd:
            curl_setopt($ch, CURLOPT_POST, 1);
            goto eSfTu;
            K5_J1:
            $sql = "select a.store_name,a.time,a.state,b.name as user_name from " . tablename("ymktv_sun_store") . " a" . " left join " . tablename("ymktv_sun_user") . " b on b.id=a.user_id  WHERE a.id=:store_id";
            goto QKDX9;
            HY0we:
            $url = "https://api.weixin.qq.com/cgi-bin/message/wxopen/template/send?access_token=" . $access_token . '';
            goto e2MUb;
            Wj15C:
            $data = curl_exec($ch);
            goto qpoHO;
            AdVR2:
        }
        goto tKAGA;
        HlYj9:
        function getaccess_token($_W)
        {
            goto YB0Iy;
            sfonp:
            $data = curl_exec($ch);
            goto ydsF2;
            mazem:
            return $data["access_token"];
            goto f369c;
            v39Y5:
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=" . $appid . "&secret=" . $secret . '';
            goto MkJqu;
            ydsF2:
            curl_close($ch);
            goto vlOnh;
            vlOnh:
            $data = json_decode($data, true);
            goto mazem;
            YB0Iy:
            $res = pdo_get("ymktv_sun_system", array("uniacid" => $_W["uniacid"]));
            goto z52QN;
            dbhoI:
            curl_setopt($ch, CURLOPT_URL, $url);
            goto m2e4V;
            MkJqu:
            $ch = curl_init();
            goto dbhoI;
            F3rNw:
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            goto sfonp;
            z52QN:
            $appid = $res["appid"];
            goto A6I1l;
            A6I1l:
            $secret = $res["appsecret"];
            goto v39Y5;
            m2e4V:
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            goto F3rNw;
            f369c:
        }
        goto U4giF;
        LUo5x:
    }
    public function doPageSaveStorePayLog()
    {
        goto AuzZa;
        PlEsR:
        $res = pdo_insert("ymktv_sun_storepaylog", $data);
        goto mFozr;
        z1tZ7:
        echo "2";
        goto k2AL0;
        c2Yky:
        $data["time"] = date("Y-m-d H:i:s");
        goto j7VbU;
        gh_no:
        $data["store_id"] = $_GPC["store_id"];
        goto GjWHy;
        aN8LY:
        Qj0SQ:
        goto rQ_dj;
        icpsw:
        Kv6y5:
        goto sFftV;
        j7VbU:
        $data["uniacid"] = $_W["uniacid"];
        goto PlEsR;
        mFozr:
        if ($res) {
            goto Qj0SQ;
        }
        goto z1tZ7;
        GjWHy:
        $data["money"] = $_GPC["money"];
        goto c2Yky;
        AuzZa:
        global $_W, $_GPC;
        goto gh_no;
        rQ_dj:
        echo "1";
        goto icpsw;
        k2AL0:
        goto Kv6y5;
        goto aN8LY;
        sFftV:
    }
    public function doPageSaveTzPayLog()
    {
        goto ChLRg;
        R5Ras:
        goto QYR3Y;
        goto uUOEv;
        ChLRg:
        global $_W, $_GPC;
        goto vWWHt;
        l2Taf:
        QYR3Y:
        goto npaFC;
        lXSdG:
        if ($res) {
            goto QN_s5;
        }
        goto WOfuq;
        INOFg:
        $data["uniacid"] = $_W["uniacid"];
        goto TcCzy;
        uUOEv:
        QN_s5:
        goto Jr5q3;
        vWWHt:
        $data["tz_id"] = $_GPC["tz_id"];
        goto pfaoa;
        WOfuq:
        echo "2";
        goto R5Ras;
        TcCzy:
        $res = pdo_insert("ymktv_sun_tzpaylog", $data);
        goto lXSdG;
        Jr5q3:
        echo "1";
        goto l2Taf;
        Op5C8:
        $data["time"] = date("Y-m-d H:i:s");
        goto INOFg;
        pfaoa:
        $data["money"] = $_GPC["money"];
        goto Op5C8;
        npaFC:
    }
    public function doPageSaveCarPayLog()
    {
        goto Et8LS;
        SREHj:
        if ($res) {
            goto X7Ush;
        }
        goto l9w2C;
        qzNKG:
        echo "1";
        goto NnjH6;
        GyN6k:
        X7Ush:
        goto qzNKG;
        l9w2C:
        echo "2";
        goto BiYMv;
        BiYMv:
        goto AF5tr;
        goto GyN6k;
        y2w3m:
        $data["time"] = date("Y-m-d H:i:s");
        goto o2KKQ;
        oamKh:
        $data["car_id"] = $_GPC["car_id"];
        goto wwt3c;
        o2KKQ:
        $data["uniacid"] = $_W["uniacid"];
        goto z33sj;
        NnjH6:
        AF5tr:
        goto j_zgp;
        wwt3c:
        $data["money"] = $_GPC["money"];
        goto y2w3m;
        Et8LS:
        global $_W, $_GPC;
        goto oamKh;
        z33sj:
        $res = pdo_insert("ymktv_sun_carpaylog", $data);
        goto SREHj;
        j_zgp:
    }
    public function doPageSaveHyPayLog()
    {
        goto RseW9;
        GldVq:
        vTlZD:
        goto gU7z9;
        BJPdG:
        VWMKK:
        goto ynfnm;
        uoN2T:
        goto vTlZD;
        goto BJPdG;
        N7aLj:
        $data["money"] = $_GPC["money"];
        goto ma3qh;
        ma3qh:
        $data["time"] = date("Y-m-d H:i:s");
        goto SQrOv;
        lzHw_:
        echo "2";
        goto uoN2T;
        RseW9:
        global $_W, $_GPC;
        goto fNx_6;
        ynfnm:
        echo "1";
        goto GldVq;
        fNx_6:
        $data["hy_id"] = $_GPC["hy_id"];
        goto N7aLj;
        ecZUn:
        if ($res) {
            goto VWMKK;
        }
        goto lzHw_;
        SQrOv:
        $data["uniacid"] = $_W["uniacid"];
        goto TBcrX;
        TBcrX:
        $res = pdo_insert("ymktv_sun_yellowpaylog", $data);
        goto ecZUn;
        gU7z9:
    }
    public function doPageSaveHotCity()
    {
        goto rEWkp;
        LqZ4h:
        goto dBroJ;
        goto HdH9q;
        OojNx:
        $data["uniacid"] = $_W["uniacid"];
        goto z27WU;
        o9p88:
        echo "2";
        goto LqZ4h;
        Z5_kD:
        if ($res) {
            goto dJ2bK;
        }
        goto o9p88;
        k8Xys:
        if (!empty($rst)) {
            goto ZaVKA;
        }
        goto waf0Y;
        n2ZsV:
        $data["cityname"] = $_GPC["cityname"];
        goto reWug;
        rEWkp:
        global $_W, $_GPC;
        goto WOzmx;
        z27WU:
        $res = pdo_insert("ymktv_sun_hotcity", $data);
        goto Z5_kD;
        HdH9q:
        dJ2bK:
        goto VJumo;
        reWug:
        $data["time"] = time();
        goto OojNx;
        WOzmx:
        $rst = pdo_get("ymktv_sun_hotcity", array("cityname" => $_GPC["cityname"], "uniacid" => $_W["uniacid"], "user_id" => $_GPC["user_id"]));
        goto k8Xys;
        zA_jn:
        dBroJ:
        goto bOb5h;
        VJumo:
        echo "1";
        goto zA_jn;
        bOb5h:
        ZaVKA:
        goto b8cX6;
        waf0Y:
        $data["user_id"] = $_GPC["user_id"];
        goto n2ZsV;
        b8cX6:
    }
    public function doPageStoreFxNum()
    {
        goto J938m;
        gX2n6:
        VRu04:
        goto HusGe;
        NqCba:
        X6dbM:
        goto xUhKc;
        J_NIV:
        $res = pdo_update("ymktv_sun_store", array("fx_num +=" => 1), array("id" => $_GPC["store_id"]));
        goto K9fo8;
        gn45L:
        goto X6dbM;
        goto gX2n6;
        J938m:
        global $_W, $_GPC;
        goto J_NIV;
        K9fo8:
        if ($res) {
            goto VRu04;
        }
        goto G1jLc;
        HusGe:
        echo "1";
        goto NqCba;
        G1jLc:
        echo "2";
        goto gn45L;
        xUhKc:
    }
    public function doPageRedPaperList()
    {
        goto zRC68;
        d3gst:
        $sql = "select a.*,b.logo,c.img as user_img from " . tablename("ymktv_sun_information") . " a" . " left join " . tablename("ymktv_sun_store") . " b on b.id=a.store_id" . " left join " . tablename("ymktv_sun_user") . " c on c.id=a.user_id  WHERE a.uniacid=:uniacid and a.hb_num>0 and a.del=2 and a.state=2 ORDER BY a.id DESC";
        goto IYtas;
        IYtas:
        $res = pdo_fetchall($sql, array(":uniacid" => $_W["uniacid"]));
        goto CxlRJ;
        zRC68:
        global $_GPC, $_W;
        goto d3gst;
        CxlRJ:
        echo json_encode($res);
        goto mh8h_;
        mh8h_:
    }
    public function doPageGetCity()
    {
        goto Uz0mA;
        Uz0mA:
        global $_W, $_GPC;
        goto OffV9;
        tTHkx:
        echo json_encode($res);
        goto OF9TS;
        OffV9:
        $res = pdo_getall("ymktv_sun_hotcity", array("uniacid" => $_W["uniacid"], "user_id" => $_GPC["user_id"]));
        goto tTHkx;
        OF9TS:
    }
    public function doPageSaveFormid()
    {
        goto ekrX1;
        c44gV:
        echo "2";
        goto Vo3_p;
        K9PNb:
        $res = pdo_insert("ymktv_sun_userformid", $data);
        goto XLlGJ;
        BrkHU:
        $data["form_id"] = $_GPC["form_id"];
        goto KQBNW;
        PcaTS:
        qqx0x:
        goto At613;
        OVpfn:
        $data["user_id"] = $_GPC["user_id"];
        goto BrkHU;
        Vo3_p:
        goto qqx0x;
        goto Y3kvy;
        rINFV:
        echo "1";
        goto PcaTS;
        KQBNW:
        $data["openid"] = $_GPC["openid"];
        goto VQk9W;
        XLlGJ:
        if ($res) {
            goto WffR7;
        }
        goto c44gV;
        VQk9W:
        $data["time"] = date("Y-m-d H:i:s");
        goto QLkFp;
        Y3kvy:
        WffR7:
        goto rINFV;
        QLkFp:
        $data["uniacid"] = $_W["uniacid"];
        goto K9PNb;
        ekrX1:
        global $_W, $_GPC;
        goto OVpfn;
        At613:
    }
    public function doPageDelFormid()
    {
        goto viGGv;
        ZQRzC:
        EEUHM:
        goto mVXFo;
        co9iz:
        $res = pdo_delete("ymktv_sun_userformid", array("user_id" => $_GPC["user_id"], "form_id" => $_GPC["form_id"]));
        goto XbGr3;
        viGGv:
        global $_W, $_GPC;
        goto co9iz;
        hpLCy:
        goto EEUHM;
        goto mbf8p;
        mbf8p:
        BLjKU:
        goto cTrqK;
        XbGr3:
        if ($res) {
            goto BLjKU;
        }
        goto dR7Qe;
        dR7Qe:
        echo "2";
        goto hpLCy;
        cTrqK:
        echo "1";
        goto ZQRzC;
        mVXFo:
    }
    public function doPageGetFormid()
    {
        goto SIdUD;
        Zhhke:
        $res = pdo_getall("ymktv_sun_userformid", array("user_id" => $_GPC["user_id"], "uniacid" => $_W["uniacid"]));
        goto roZD2;
        SIdUD:
        global $_W, $_GPC;
        goto Zhhke;
        roZD2:
        echo json_encode($res);
        goto LuDoP;
        LuDoP:
    }
    public function doPageTzhfMessage()
    {
        goto XOvTG;
        nWDqQ:
        function getaccess_token($_W)
        {
            goto wS8oF;
            jRfhz:
            $data = json_decode($data, true);
            goto tKvJq;
            wS8oF:
            $res = pdo_get("ymktv_sun_system", array("uniacid" => $_W["uniacid"]));
            goto lY6L_;
            TW1BT:
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            goto fuxhv;
            H72qk:
            curl_setopt($ch, CURLOPT_URL, $url);
            goto VXIJf;
            lY6L_:
            $appid = $res["appid"];
            goto E63NP;
            fuxhv:
            $data = curl_exec($ch);
            goto K8g2n;
            VXIJf:
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            goto TW1BT;
            K8g2n:
            curl_close($ch);
            goto jRfhz;
            tKvJq:
            return $data["access_token"];
            goto r2toF;
            E63NP:
            $secret = $res["appsecret"];
            goto k1GG6;
            k1GG6:
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=" . $appid . "&secret=" . $secret . '';
            goto Ypj0Z;
            Ypj0Z:
            $ch = curl_init();
            goto H72qk;
            r2toF:
        }
        goto pyBaG;
        XOvTG:
        global $_W, $_GPC;
        goto nWDqQ;
        VAxEZ:
        echo set_msg($_W, $_GPC);
        goto eQ9G1;
        pyBaG:
        function set_msg($_W, $_GPC)
        {
            goto DscbK;
            MRm96:
            $data = curl_exec($ch);
            goto fa5Cc;
            DSO3y:
            $ch = curl_init();
            goto SeKr3;
            cVNZn:
            $res = pdo_fetch($sql, array(":id" => $_GPC["pl_id"]));
            goto piebg;
            DscbK:
            $access_token = getaccess_token($_W);
            goto TDh0v;
            LHmV1:
            $formwork = "{\n     \"touser\": \"" . $_GET["openid"] . "\",\n     \"template_id\": \"" . $res2["tid3"] . "\",\n     \"page\":\"ymktv_sun/pages/infodetial/infodetial?id=" . $res["information_id"] . "\",\n     \"form_id\":\"" . $_GET["form_id"] . "\",\n     \"data\": {\n       \"keyword1\": {\n         \"value\": \"" . $res["details"] . "\",\n         \"color\": \"#173177\"\n       },\n       \"keyword2\": {\n         \"value\":\"" . $res["user_name"] . "\",\n         \"color\": \"#173177\"\n       },\n       \"keyword3\": {\n         \"value\": \"" . $time . "\",\n         \"color\": \"#173177\"\n       }\n      \n     }   \n   }";
            goto gijMK;
            xuvKf:
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            goto g1mcU;
            g1mcU:
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            goto fDlnZ;
            SeKr3:
            curl_setopt($ch, CURLOPT_URL, $url);
            goto xuvKf;
            W1k1e:
            $sql = "select a.details,a.information_id,a.time,b.name as user_name from " . tablename("ymktv_sun_comments") . " a" . " left join " . tablename("ymktv_sun_user") . " b on b.id=a.user_id  WHERE a.id=:id ";
            goto cVNZn;
            fa5Cc:
            curl_close($ch);
            goto P3a5q;
            TDh0v:
            $res2 = pdo_get("ymktv_sun_sms", array("uniacid" => $_W["uniacid"]));
            goto W1k1e;
            P3a5q:
            return $data;
            goto KVpN6;
            gijMK:
            $url = "https://api.weixin.qq.com/cgi-bin/message/wxopen/template/send?access_token=" . $access_token . '';
            goto DSO3y;
            fDlnZ:
            curl_setopt($ch, CURLOPT_POST, 1);
            goto SWNTu;
            SWNTu:
            curl_setopt($ch, CURLOPT_POSTFIELDS, $formwork);
            goto MRm96;
            piebg:
            $time = date("Y-m-d H:i:s", $res["time"]);
            goto LHmV1;
            KVpN6:
        }
        goto VAxEZ;
        eQ9G1:
    }
    public function doPageStorehfMessage()
    {
        goto xUNS5;
        IN8zD:
        echo set_msg($_W, $_GPC);
        goto KjsIB;
        xUNS5:
        global $_W, $_GPC;
        goto GQSB8;
        GQSB8:
        function getaccess_token($_W)
        {
            goto zJ3qp;
            BqKGn:
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            goto M2YHc;
            A1pEb:
            $data = json_decode($data, true);
            goto t8tVE;
            OJ26c:
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=" . $appid . "&secret=" . $secret . '';
            goto gp3_H;
            gGifx:
            $data = curl_exec($ch);
            goto tipbX;
            gp3_H:
            $ch = curl_init();
            goto tBUNQ;
            h4xnO:
            $secret = $res["appsecret"];
            goto OJ26c;
            t8tVE:
            return $data["access_token"];
            goto Mex8h;
            tBUNQ:
            curl_setopt($ch, CURLOPT_URL, $url);
            goto BqKGn;
            tipbX:
            curl_close($ch);
            goto A1pEb;
            zJ3qp:
            $res = pdo_get("ymktv_sun_system", array("uniacid" => $_W["uniacid"]));
            goto IQLTW;
            IQLTW:
            $appid = $res["appid"];
            goto h4xnO;
            M2YHc:
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            goto gGifx;
            Mex8h:
        }
        goto xePvw;
        xePvw:
        function set_msg($_W, $_GPC)
        {
            goto DfKk6;
            Mfzf_:
            curl_setopt($ch, CURLOPT_URL, $url);
            goto jL7Un;
            amZKG:
            $formwork = "{\n     \"touser\": \"" . $_GET["openid"] . "\",\n     \"template_id\": \"" . $res2["tid3"] . "\",\n     \"page\":\"ymktv_sun/pages/sellerinfo/sellerinfo?id=" . $res["store_id"] . "\",\n     \"form_id\":\"" . $_GET["form_id"] . "\",\n     \"data\": {\n       \"keyword1\": {\n         \"value\": \"" . $res["details"] . "\",\n         \"color\": \"#173177\"\n       },\n       \"keyword2\": {\n         \"value\":\"" . $res["user_name"] . "\",\n         \"color\": \"#173177\"\n       },\n       \"keyword3\": {\n         \"value\": \"" . $time . "\",\n         \"color\": \"#173177\"\n       }\n      \n     }   \n   }";
            goto iGZA1;
            d_zID:
            return $data;
            goto eC09n;
            SLgHP:
            $res = pdo_fetch($sql, array(":id" => $_GPC["pl_id"]));
            goto WTfIp;
            DfKk6:
            $access_token = getaccess_token($_W);
            goto oouv0;
            Kwovh:
            curl_setopt($ch, CURLOPT_POSTFIELDS, $formwork);
            goto PxF6P;
            yD5YJ:
            curl_close($ch);
            goto d_zID;
            WTfIp:
            $time = date("Y-m-d H:i:s", $res["time"]);
            goto amZKG;
            iGZA1:
            $url = "https://api.weixin.qq.com/cgi-bin/message/wxopen/template/send?access_token=" . $access_token . '';
            goto rWaVJ;
            A87M6:
            curl_setopt($ch, CURLOPT_POST, 1);
            goto Kwovh;
            jL7Un:
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            goto w0zD4;
            KBd9O:
            $sql = "select a.details,a.store_id,a.time,b.name as user_name from " . tablename("ymktv_sun_comments") . " a" . " left join " . tablename("ymktv_sun_user") . " b on b.id=a.user_id  WHERE a.id=:id ";
            goto SLgHP;
            PxF6P:
            $data = curl_exec($ch);
            goto yD5YJ;
            w0zD4:
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            goto A87M6;
            rWaVJ:
            $ch = curl_init();
            goto Mfzf_;
            oouv0:
            $res2 = pdo_get("ymktv_sun_sms", array("uniacid" => $_W["uniacid"]));
            goto KBd9O;
            eC09n:
        }
        goto IN8zD;
        KjsIB:
    }
    public function doPageMyPost2()
    {
        goto fug_D;
        fug_D:
        global $_GPC, $_W;
        goto pxvgY;
        m45xn:
        $sql = "select a.*,b.type_name,c.name as type2_name from " . tablename("ymktv_sun_information") . " a" . " left join " . tablename("ymktv_sun_type") . " b on b.id=a.type_id  " . " left join " . tablename("ymktv_sun_type2") . " c on a.type2_id=c.id   WHERE a.store_id=:store_id and a.del=2   ORDER BY a.id DESC";
        goto ldjP5;
        ldjP5:
        $select_sql = $sql . " LIMIT " . ($pageindex - 1) * $pagesize . "," . $pagesize;
        goto fhozL;
        wD_J1:
        $pagesize = 10;
        goto m45xn;
        fhozL:
        $res = pdo_fetchall($select_sql, array(":store_id" => $_GPC["user_id"]));
        goto uaUZE;
        uaUZE:
        echo json_encode($res);
        goto lp6aZ;
        pxvgY:
        $pageindex = max(1, intval($_GPC["page"]));
        goto wD_J1;
        lp6aZ:
    }

    public function doPageHbFx()
    {
        goto osZIW;
        P5S31:
        if ($res) {
            goto Vsr1k;
        }
        goto P19DC;
        rwH0p:
        echo 1;
        goto izASf;
        P19DC:
        echo 2;
        goto yD39X;
        TpCXK:
        $res = pdo_update("ymktv_sun_information", array("hbfx_num +=" => 1), array("id" => $_GPC["information_id"]));
        goto P5S31;
        yD39X:
        goto csa4V;
        goto t72k8;
        osZIW:
        global $_GPC, $_W;
        goto TpCXK;
        t72k8:
        Vsr1k:
        goto rwH0p;
        izASf:
        csa4V:
        goto Jbsjn;
        Jbsjn:
    }
    public function doPageGetAdInfo()
    {
        goto ZN0Uv;
        riksE:
        $res = pdo_get("ymktv_sun_ad", array("id" => $_GPC["ad_id"]));
        goto mgcwQ;
        mgcwQ:
        echo json_encode($res);
        goto a4Dyg;
        ZN0Uv:
        global $_GPC, $_W;
        goto riksE;
        a4Dyg:
    }
public function doPageBanner()
{
    global $_W, $_GPC;
    $location = $_GPC["location"];
    if ($location == "1") {
        $index_banner = pdo_get("ymktv_sun_banner", array("uniacid" => $_W["uniacid"], "location" => 1));
        $index_banner["lb_imgs"] = explode(",", $index_banner["lb_imgs"]);
        echo json_encode($index_banner);
    }
    if ($location == '2') {
        $drink_banner = pdo_get("ymktv_sun_banner", array("uniacid" => $_W["uniacid"], "location" => 2));
        $drink_banner["lb_imgs"] = explode(",", $drink_banner["lb_imgs"]);
        echo json_encode($drink_banner);
    }
	if ($location == '3') {
        $drink_banner = pdo_get("ymktv_sun_banner", array("uniacid" => $_W["uniacid"], "location" => 3));
        echo json_encode($drink_banner);
    }
}
    public function doPageGetUserCouponInfo()
    {
        goto BMO_w;
        Oq68x:
        p9Ykr:
        goto PyTLT;
        PyTLT:
        $i++;
        goto t3w1N;
        BMO_w:
        global $_W, $_GPC;
        goto Lu3qJ;
        IKjkk:
        Mw0eX:
        goto bJ6lE;
        Ya_Ak:
        foreach ($res as $re) {
            $temp = $temp . $re["id"] . ",";
            dBQWL:
        }
        goto NeH4i;
        t3w1N:
        goto vEF07;
        goto paXp_;
        z568o:
        $res = rtrim($temp, ",");
        goto NG6_I;
        mC8qj:
        $data[$i]["val"] = json_decode($data[$i]["val"]);
        goto Oq68x;
        pkeyP:
        if (!($i < count($data))) {
            goto e3C26;
        }
        goto mC8qj;
        paXp_:
        e3C26:
        goto VYWYK;
        c_aef:
        Y6EmT:
        goto QGtYG;
        bJ6lE:
        $temp = '';
        goto Ya_Ak;
        HXYgT:
        echo json_encode(array("code" => "fail", "data" => null));
        goto IlBRf;
        ijJAM:
        $data = pdo_fetchall($getCouponSql);
        goto RmDQd;
        EJpfs:
        vEF07:
        goto pkeyP;
        IlBRf:
        goto Y6EmT;
        goto IKjkk;
        NG6_I:
        $getCouponSql = "SELECT * FROM ims_ymktv_sun_coupon t WHERE t.id in " . "(" . $res . ")";
        goto ijJAM;
        VYWYK:
        echo json_encode(array("code" => success, "data" => $data));
        goto c_aef;
        xxPdM:
        $res = pdo_fetchall($sql);
        goto wTLm5;
        Lu3qJ:
        $sql = "SELECT t2.id FROM ims_ymktv_sun_user_coupon t INNER JOIN (SELECT t1.id,t1.antime FROM ims_ymktv_sun_coupon t1) AS t2 ON t.user_id = " . $_GPC["user_id"] . " AND t.uniacid = " . $_W["uniacid"] . "  AND t.coupon_id = t2.id AND t2.antime > NOW()";
        goto xxPdM;
        wTLm5:
        if ($res) {
            goto Mw0eX;
        }
        goto HXYgT;
        NeH4i:
        JW_Wu:
        goto z568o;
        RmDQd:
        $i = 0;
        goto EJpfs;
        QGtYG:
    }
    public function doPageHotTeamGoods()
    {
        goto Jq8JH;
        iNrFY:
        $sql = "SELECT t1.goods_name,t1.end_place,t1.goods_price,t1.thumbnail FROM ims_ymktv_sun_goods t1 WHERE t1.id in (SELECT t.goodsId FROM ims_ymktv_sun_teamwork t ORDER BY t.peopleNum DESC) AND t1.uniacid = " . $_W["uniacid"];
        goto B20AT;
        Jq8JH:
        global $_W, $_GPC;
        goto iNrFY;
        cwqST:
        echo json_encode($res);
        goto Y_zue;
        B20AT:
        $res = pdo_fetchall($sql);
        goto cwqST;
        Y_zue:
    }
    public function doPageGetLocalTeam()
    {
        goto jHUdD;
        l8jhS:
        echo json_encode($res);
        goto XVEn3;
        YjEAn:
        $sql = "SELECT t2.peopleNum,t1.goods_name,t1.goods_price,t1.id,t1.thumbnail FROM ims_ymktv_sun_goods t1 INNER JOIN (SELECT t.peopleNum,t.goodsId FROM ims_ymktv_sun_teamwork t WHERE t.endTime > NOW() AND t.uniacid = " . $_W["uniacid"] . ") AS t2 WHERE t2.goodsId = t1.id AND t1.start_place LIKE " . $localPlace;
        goto htbqb;
        jHUdD:
        global $_W, $_GPC;
        goto cFKQw;
        htbqb:
        $res = pdo_fetchall($sql);
        goto l8jhS;
        cFKQw:
        $localPlace = "'" . "%厦门%" . "'";
        goto YjEAn;
        XVEn3:
    }
    public function doPageGoodsDeatil()
    {
        goto kTFPy;
        ToGmQ:
        echo json_encode($res);
        goto j9CV4;
        b2nz4:
        $where = " where uniacid = " . $_W["uniacid"] . " and id = " . $_GPC["gid"];
        goto DKzeA;
        kTFPy:
        global $_W, $_GPC;
        goto b2nz4;
        DKzeA:
        $sql = "SELECT * FROM ims_ymktv_sun_goods  " . $where;
        goto da8GU;
        ag51_:
        $res["imgs"] = explode(",", $res["imgs"]);
        goto ToGmQ;
        da8GU:
        $res = pdo_fetch($sql);
        goto ag51_;
        j9CV4:
    }
    public function doPageGetCoupen()
    {
        goto IF_PJ;
        plCTx:
        muW4y:
        goto lhHlF;
        lhHlF:
        $i++;
        goto HQNWd;
        z0lSF:
        $i = 0;
        goto pcI9C;
        ZXhtq:
        $res[$i]["val"] = json_decode($res[$i]["val"]);
        goto plCTx;
        AlOkV:
        if (!($i < count($res))) {
            goto Nag8F;
        }
        goto ZXhtq;
        IF_PJ:
        global $_W, $_GPC;
        goto tYH1n;
        HQNWd:
        goto AaJcF;
        goto gF5x7;
        PM_U1:
        echo json_encode($res);
        goto bwQZz;
        gF5x7:
        Nag8F:
        goto PM_U1;
        OpMFA:
        $res = pdo_fetchall($sql);
        goto z0lSF;
        pcI9C:
        AaJcF:
        goto AlOkV;
        tYH1n:
        $sql = "SELECT * FROM ims_ymktv_sun_coupon t WHERE t.antime >= NOW() AND t.weid = " . $_W["weid"] . " AND t.allowance > 0";
        goto OpMFA;
        bwQZz:
    }
    public function doPageReceiveCoupen()
    {
        goto FRu1R;
        H1kgk:
        goto bWy15;
        goto wpkze;
        rxtOk:
        echo json_encode(array("code" => "fail", "msg" => "已经领取过啦"));
        goto H1kgk;
        g16bf:
        echo json_encode(array("code" => "success", "msg" => "领取成功"));
        goto ILAZa;
        lrivz:
        WqxvY:
        goto G9Wlf;
        G9Wlf:
        echo json_encode(array("code" => "fail", "msg" => "优惠券已经被领完啦"));
        goto BP4kA;
        tSgHM:
        if ($info == null) {
            goto zLMyX;
        }
        goto rxtOk;
        B8dRV:
        $data = array("uniacid" => $_W["uniacid"], "user_id" => $_GPC["user_id"], "coupon_id" => $_GPC["id"], "addtime" => date("Y-m-d H:i:s"), "begin_time" => date("Y-m-d H:i:s"), "end_time" => date("Y-m-d H:i:s", strtotime($laterdays)), "is_expire" => 0, "is_use" => 0, "is_delete" => 0);
        goto uLIOP;
        HRTDH:
        pdo_update("ymktv_sun_coupon", $res, array("id" => $_GPC["id"], "weid" => $_W["weid"]));
        goto swKwA;
        BP4kA:
        TyQaQ:
        goto Y44ov;
        dXvM2:
        $info = pdo_get("ymktv_sun_user_coupon", array("coupon_id" => $_GPC["id"], "user_id" => $_GPC["user_id"]));
        goto tSgHM;
        FRu1R:
        global $_W, $_GPC;
        goto D6jlB;
        ILAZa:
        bWy15:
        goto xfk17;
        xfk17:
        goto TyQaQ;
        goto lrivz;
        M6id6:
        $res["allowance"] = $res["allowance"] - 1;
        goto HRTDH;
        wpkze:
        zLMyX:
        goto M6id6;
        D6jlB:
        $res = pdo_get("ymktv_sun_coupon", array("weid" => $_W["weid"], id => $_GPC["id"]));
        goto iCdWB;
        swKwA:
        $laterdays = "+" . $res["expiryDate"] . " days";
        goto B8dRV;
        uLIOP:
        pdo_insert("ymktv_sun_user_coupon", $data, false);
        goto g16bf;
        iCdWB:
        if ($res["allowance"] < 0) {
            goto WqxvY;
        }
        goto dXvM2;
        Y44ov:
    }
    public function doPageMy()
    {
        goto D96jk;
        Vb9rT:
        echo json_encode($res);
        goto V6Q2w;
        ihvP7:
        $user = pdo_get("ymktv_sun_user", array("id" => $_GPC["user_id"], "uniacid" => $_W["uniacid"]));
        goto Gy_cv;
        D96jk:
        global $_W, $_GPC;
        goto ihvP7;
        uObCf:
        $res = array("user" => $user);
        goto Vb9rT;
        Gy_cv:
        $countAttentionSql = "SELECT COUNT(id) AS attention_num FROM ims_ymktv_sun_attention t WHERE t.uniacid = " . $_W["uniacid"] . " AND t.fans_id = " . $_GPC["user_id"];
        goto TqCdy;
        TqCdy:
        $attention_num = pdo_fetch($countAttentionSql);
        goto uObCf;
        V6Q2w:
    }
    public function doPageGetlitePic()
    {
        goto lc6e4;
        lc6e4:
        global $_W, $_GPC;
        goto pMW9B;
        xLqFS:
        echo json_encode($imgs);
        goto CqUK3;
        pMW9B:
        $sql = "SELECT * FROM ims_ymktv_sun_expert WHERE uniacid = " . $_W["uniacid"] . " AND user_id = " . $_GPC["user_id"] . " ORDER BY release_time DESC LIMIT 3";
        goto e5X8k;
        e5X8k:
        $imgs = pdo_fetchall($sql);
        goto xLqFS;
        CqUK3:
    }
    public function doPageBussinessLogin()
    {
        goto OAw10;
        sH00K:
        PyHpB:
        goto Dpxp8;
        NAIoc:
        echo json_encode(array("code" => "fail", "msg" => $password));
        goto JmY6M;
        kvhal:
        pdo_update("ymktv_sun_business_account", $data, array("uniacid" => $_W["uniacid"], "account" => $_GPC["account"]));
        goto xM63g;
        vZHeq:
        PU1UB:
        goto cg_EF;
        z4lHs:
        if ($res) {
            goto PU1UB;
        }
        goto NAIoc;
        xM63g:
        echo json_encode(array("code" => "success", "msg" => $password));
        goto sH00K;
        qDlsO:
        $data = array("account" => $_GPC["account"], "password" => $password, "username" => $user["name"], "img" => $user["img"]);
        goto kvhal;
        JmY6M:
        goto PyHpB;
        goto vZHeq;
        zudAL:
        $res = pdo_get("ymktv_sun_business_account", array("account" => $_GPC["account"], "password" => $password, "uniacid" => $_W["uniacid"]));
        goto z4lHs;
        OAw10:
        global $_W, $_GPC;
        goto X30jm;
        X30jm:
        $password = md5($_GPC["password"]);
        goto zudAL;
        cg_EF:
        $user = pdo_get("ymktv_sun_user", array("id" => $_GPC["user_id"], "uniacid" => $_W["uniacid"]));
        goto qDlsO;
        Dpxp8:
    }
    public function doPageGetBusinessUserInfo()
    {
        goto YxYR9;
        I0m6Z:
        echo json_encode($res);
        goto FVPtf;
        cmzyn:
        $res = pdo_get("ymktv_sun_business_account", array("uniacid" => $_W["uniacid"], "account" => $_GPC["account"]));
        goto I0m6Z;
        YxYR9:
        global $_W, $_GPC;
        goto cmzyn;
        FVPtf:
    }
    public function doPageGetBusinessIndexInfo()
    {
        goto XT4vj;
        fxEWQ:
        $countSuccessOrderSql = "SELECT COUNT(id) AS successOrder_num FROM ims_ymktv_sun_order t WHERE t.uniacid = " . $_GPC["uniacid"] . " AND t.state = 2 AND t.del2 = 2";
        goto nbvgK;
        la9ja:
        $todayend = mktime(0, 0, 0, date("m"), date("d") + 1, date("Y")) - 1;
        goto HFg9S;
        TsY3p:
        date_default_timezone_set("Asia/Shanghai");
        goto lSU3P;
        DB_hL:
        $yestoday_money = pdo_fetch($countYestodayMoneySql);
        goto by0Bi;
        PHkuO:
        $countTodayMoneySql = "SELECT sum(money) AS today_money FROM ims_ymktv_sun_order t WHERE t.uniacid = " . $_GPC["uniacid"] . " AND state = 2 AND del2 = 2 AND t.time between " . $todaystart . " AND " . $todayend;
        goto uZMzn;
        mDl6v:
        $yestodayend = mktime(0, 0, 0, date("m"), date("d"), date("Y")) - 1;
        goto oeoEI;
        HXZbI:
        $today_money = 0;
        goto VPRSD;
        pSpMx:
        $countWaitReceivOrderSql = "SELECT COUNT(id) AS waitReceiveOrder_num FROM ims_ymktv_sun_order t WHERE t.uniacid = " . $_GPC["uniacid"] . " AND t.state = 1 AND t.del2 = 2";
        goto ET6eL;
        FYQNU:
        $todaySuccessOrder_num = pdo_fetch($countTodaySuccessOrderSql);
        goto e9ico;
        HFg9S:
        $yestodaystart = mktime(0, 0, 0, date("m"), date("d") - 1, date("Y"));
        goto mDl6v;
        oeoEI:
        $countTodayOrderNumSql = "SELECT COUNT(id) AS todayOrder_num FROM ims_ymktv_sun_order t WHERE t.uniacid = " . $_GPC["uniacid"] . " AND t.time between " . $todaystart . " AND " . $todayend;
        goto i2wUP;
        lSU3P:
        $todaystart = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
        goto la9ja;
        uZMzn:
        $today_money = pdo_fetch($countTodayMoneySql);
        goto wmqsN;
        nbvgK:
        $successOrder_num = pdo_fetch($countSuccessOrderSql);
        goto PHkuO;
        e9ico:
        $countUserNumSql = "SELECT COUNT(id) AS user_num FROM ims_ymktv_sun_user t WHERE t.uniacid = " . $_GPC["uniacid"];
        goto wJQCL;
        wJQCL:
        $user_num = pdo_fetch($countUserNumSql);
        goto pSpMx;
        JA9pc:
        if ($today_money) {
            goto IgDbO;
        }
        goto HXZbI;
        pKG6F:
        echo json_encode($res);
        goto VQOh3;
        vWpP1:
        $sum_money = pdo_fetch($countMoneySql);
        goto JA9pc;
        VPRSD:
        IgDbO:
        goto Xh45O;
        wmqsN:
        $countYestodayMoneySql = "SELECT sum(money) AS yestoday_money FROM ims_ymktv_sun_order t WHERE t.uniacid = " . $_GPC["uniacid"] . " AND state = 2 AND del2 = 2 AND t.time between " . $yestodaystart . " AND " . $yestodayend;
        goto DB_hL;
        ET6eL:
        $waitReceiveOrder_num = pdo_fetch($countWaitReceivOrderSql);
        goto fxEWQ;
        XT4vj:
        global $_W, $_GPC;
        goto TsY3p;
        i2wUP:
        $todayOrder_num = pdo_fetch($countTodayOrderNumSql);
        goto WLo30;
        Xh45O:
        $res = array("todayOrder_num" => $todayOrder_num, "todaySuccessOrder_num" => $todaySuccessOrder_num, "waitReceiveOrder_num" => $waitReceiveOrder_num, "successOrder_num" => $successOrder_num, "today_money" => $today_money, "yestoday_money" => $yestoday_money, "sum_money" => $sum_money, "user_num" => $user_num);
        goto pKG6F;
        by0Bi:
        $countMoneySql = "SELECT SUM(t.money) AS sum_money FROM ims_ymktv_sun_order t WHERE t.uniacid = " . $_GPC["uniacid"];
        goto vWpP1;
        WLo30:
        $countTodaySuccessOrderSql = "SELECT COUNT(id) AS todaySuccessOrder_num FROM ims_ymktv_sun_order t WHERE t.uniacid = " . $_GPC["uniacid"] . " AND state = 2 AND del2 = 2 AND t.time between " . $todaystart . " AND " . $todayend;
        goto FYQNU;
        VQOh3:
    }
    public function doPageGetBuinessOrder()
    {
        goto HGPyI;
        N5uSF:
        $getSuccessSql = "SELECT * FROM ims_ymktv_sun_order t WHERE t.state = 2 AND t.del2 = 2 AND t.uniacid = " . $_GPC["uniacid"] . " ORDER BY t.time desc";
        goto TKSCi;
        fNy85:
        if ($_GPC["goId"] == 0) {
            goto QDe1y;
        }
        goto WPosl;
        iwctr:
        echo json_encode($noPayOrder);
        goto zECSa;
        glU4a:
        goto ZEtJT;
        goto ByRnE;
        Lz3bF:
        $noPayOrder = pdo_fetchall($getNoPaySql);
        goto iwctr;
        P_MaO:
        kOv22:
        goto N5uSF;
        HGPyI:
        global $_W, $_GPC;
        goto fNy85;
        WPosl:
        if ($_GPC["goId"] == 1) {
            goto kOv22;
        }
        goto glU4a;
        ByRnE:
        QDe1y:
        goto cxkIm;
        zECSa:
        goto ZEtJT;
        goto P_MaO;
        rMqSR:
        echo json_encode($payOrder);
        goto x7tFM;
        TKSCi:
        $payOrder = pdo_fetchall($getSuccessSql);
        goto rMqSR;
        cxkIm:
        $getNoPaySql = "SELECT * FROM ims_ymktv_sun_order t WHERE t.state = 1 AND t.del2 = 2 AND t.uniacid = " . $_GPC["uniacid"] . " ORDER BY t.time desc";
        goto Lz3bF;
        x7tFM:
        ZEtJT:
        goto jWezd;
        jWezd:
    }
    public function doPageWhetherCollection()
    {
        goto uzb1o;
        aJD0n:
        $res = pdo_get("ymktv_sun_goods_collection", array("goods_id" => $_GPC["goods_id"], "user_id" => $_GPC["user_id"], "uniacid" => $_W["uniacid"]));
        goto Fe2e0;
        RveQJ:
        KUSlU:
        goto S0DBz;
        uzb1o:
        global $_W, $_GPC;
        goto aJD0n;
        S0DBz:
        echo json_encode("0");
        goto sMFQv;
        sMFQv:
        RNgVR:
        goto AHovf;
        uJ8j7:
        goto RNgVR;
        goto RveQJ;
        Fe2e0:
        if ($res) {
            goto KUSlU;
        }
        goto btxVv;
        btxVv:
        echo json_encode("1");
        goto uJ8j7;
        AHovf:
    }
    public function doPageTeamCollection()
    {
        goto NpBrl;
        bNpDG:
        goto osmDV;
        goto KHUzX;
        IJC3W:
        osmDV:
        goto o6uM7;
        Jx1mu:
        $res = pdo_get("ymktv_sun_goods_collection", array("goods_id" => $team["goodsId"], "user_id" => $_GPC["user_id"], "uniacid" => $_W["uniacid"]));
        goto Uu1e5;
        JihVJ:
        echo json_encode("0");
        goto IJC3W;
        IdmCV:
        echo json_encode("1");
        goto bNpDG;
        KHUzX:
        hq_jw:
        goto JihVJ;
        NpBrl:
        global $_W, $_GPC;
        goto u4Wvj;
        u4Wvj:
        $team = pdo_get("ymktv_sun_teamwork", array("uniacid" => $_W["uniacid"], "id" => $_GPC["teamId"]));
        goto Jx1mu;
        Uu1e5:
        if ($res) {
            goto hq_jw;
        }
        goto IdmCV;
        o6uM7:
    }
    public function doPageVisaCollection()
    {
        goto G2GRL;
        p1stA:
        ccI5l:
        goto Rj6Wn;
        zWH_L:
        pykX5:
        goto vQKji;
        Rj6Wn:
        echo json_encode("0");
        goto zWH_L;
        IqJaD:
        echo json_encode("1");
        goto XM9_i;
        Y9xYS:
        if ($res) {
            goto ccI5l;
        }
        goto IqJaD;
        lbuZW:
        $res = pdo_get("ymktv_sun_visa_collection", array("uniacid" => $_W["uniacid"], "user_id" => $_GPC["user_id"], "visa_id" => $_GPC["visa_id"]));
        goto Y9xYS;
        XM9_i:
        goto pykX5;
        goto p1stA;
        G2GRL:
        global $_W, $_GPC;
        goto lbuZW;
        vQKji:
    }
    public function doPageCollectionGoods()
    {
        goto PRDIq;
        UPnTc:
        if ($res) {
            goto bAbDi;
        }
        goto DChwA;
        txqf8:
        echo json_encode(array("code" => "success", "msg" => "收藏成功"));
        goto tQYQX;
        DiU8L:
        $data = array("user_id" => $_GPC["user_id"], "goods_id" => $_GPC["goods_id"], "uniacid" => $_W["uniacid"], "time" => date("Y-m-d H:i:s"));
        goto ZLfLF;
        DChwA:
        echo json_encode(array("code" => "fail", "msg" => "收藏失败"));
        goto aVWDt;
        aVWDt:
        goto H9MPE;
        goto IpSB0;
        ZLfLF:
        $res = pdo_insert("ymktv_sun_goods_collection", $data);
        goto UPnTc;
        tQYQX:
        H9MPE:
        goto cuMdn;
        IpSB0:
        bAbDi:
        goto txqf8;
        PRDIq:
        global $_W, $_GPC;
        goto DiU8L;
        cuMdn:
    }
    public function doPageCacheCollectionGoods()
    {
        goto UeyJr;
        lC1R_:
        goto y0OpI;
        goto Tdian;
        UeyJr:
        global $_W, $_GPC;
        goto CgtVi;
        CgtVi:
        $res = pdo_delete("ymktv_sun_goods_collection", array("uniacid" => $_W["uniacid"], "user_id" => $_GPC["user_id"], "goods_id" => $_GPC["goods_id"]));
        goto UjPoB;
        Tdian:
        RC1nk:
        goto v1NP4;
        l0osS:
        echo json_encode(array("code" => "fail", "msg" => "取消失败"));
        goto lC1R_;
        UjPoB:
        if ($res) {
            goto RC1nk;
        }
        goto l0osS;
        v1NP4:
        echo json_encode(array("code" => "success", "msg" => "取消收藏"));
        goto mdztc;
        mdztc:
        y0OpI:
        goto LZSzq;
        LZSzq:
    }
    public function doPageGetCollectionGoods()
    {
        goto cHkSG;
        cHkSG:
        global $_W, $_GPC;
        goto A_5wf;
        QB0XE:
        $res = pdo_fetchall($sql);
        goto F6ek1;
        A_5wf:
        $sql = "SELECT * FROM ims_ymktv_sun_goods_collection t INNER JOIN (SELECT t1.id AS goods_id,t1.thumbnail,t1.goods_name,t1.goods_price,t1.pre_type FROM ims_ymktv_sun_goods t1 WHERE t1.uniacid = " . $_W["uniacid"] . ") AS t2 ON t2.goods_id = t.goods_id AND t.user_id = " . $_GPC["user_id"] . " AND t.uniacid = " . $_W["uniacid"];
        goto QB0XE;
        F6ek1:
        echo json_encode($res);
        goto tSsu_;
        tSsu_:
    }
    public function doPageCollectionVisa()
    {
        goto DQdvc;
        WAFTr:
        echo json_encode(array("code" => "success", "msg" => "收藏成功"));
        goto ajElK;
        FyG8W:
        SWgqW:
        goto WAFTr;
        DQdvc:
        global $_W, $_GPC;
        goto jUK3O;
        ajElK:
        q7BkK:
        goto SfULQ;
        s_C1n:
        $res = pdo_insert("ymktv_sun_visa_collection", $data);
        goto Xa42C;
        cERXZ:
        echo json_encode(array("code" => "fail", "msg" => "收藏失败"));
        goto as6SO;
        Xa42C:
        if ($res) {
            goto SWgqW;
        }
        goto cERXZ;
        as6SO:
        goto q7BkK;
        goto FyG8W;
        jUK3O:
        $data = array("uniacid" => $_W["uniacid"], "user_id" => $_GPC["user_id"], "visa_id" => $_GPC["visa_id"], "time" => date("Y-m-d H:i:s"));
        goto s_C1n;
        SfULQ:
    }
    public function doPageCacheCollectionVisa()
    {
        goto I2ke7;
        tK0gg:
        echo json_encode(array("code" => "success", "msg" => "取消成功"));
        goto H0e6L;
        h9Div:
        goto SoXhI;
        goto ejm36;
        ejm36:
        lE7SJ:
        goto tK0gg;
        I2ke7:
        global $_W, $_GPC;
        goto didp7;
        X53MP:
        if ($res) {
            goto lE7SJ;
        }
        goto qGawa;
        didp7:
        $res = pdo_delete("ymktv_sun_visa_collection", array("user_id" => $_GPC["user_id"], "visa_id" => $_GPC["visa_id"], "uniacid" => $_W["uniacid"]));
        goto X53MP;
        H0e6L:
        SoXhI:
        goto Tr9Br;
        qGawa:
        echo json_encode(array("code" => "fail", "msg" => "取消失败"));
        goto h9Div;
        Tr9Br:
    }
    public function doPageGetUserInfo()
    {
        goto SwDq0;
        LgF3y:
        $code = $_GPC["code"];
        goto X2Lyg;
        ttNaj:
        curl_setopt($ch, CURLOPT_URL, "https://api.weixin.qq.com/sns/jscode2session");
        goto V8nVs;
        hUh5Z:
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        goto bnhP2;
        V8nVs:
        curl_setopt($ch, CURLOPT_HEADER, 0);
        goto C1JVt;
        qcIU1:
        die(json_encode($result));
        goto q9hHM;
        qrGzH:
        curl_setopt($ch, CURLOPT_POST, 1);
        goto seYmD;
        bnhP2:
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        goto bRdYy;
        X2Lyg:
        $data = pdo_get("ymktv_sun_system", array("uniacid" => $_W["uniacid"]));
        goto vczto;
        bRdYy:
        $result = curl_exec($ch);
        goto qcIU1;
        CMplc:
        $data = array("appid" => $appdid, "secret" => $secret, "js_code" => $code, "grant_type" => "authorization_code");
        goto CBfLY;
        C1JVt:
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        goto qrGzH;
        seYmD:
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        goto hUh5Z;
        vczto:
        $appdid = $data["appid"];
        goto yGEmB;
        CBfLY:
        $ch = curl_init();
        goto ttNaj;
        yGEmB:
        $secret = $data["appsecret"];
        goto CMplc;
        SwDq0:
        global $_GPC, $_W;
        goto LgF3y;
        q9hHM:
    }
    public function doPageRoomcate()
    {
        goto iLq9F;
        HpG8m:
        $cate = pdo_getall("ymktv_sun_type", array("uniacid" => $_W["uniacid"]), '', '', "sort DESC");
        goto b9RSk;
        b9RSk:
        echo json_encode($cate);
        goto S2ztC;
        iLq9F:
        global $_W;
        goto HpG8m;
        S2ztC:
    }
    public function doPageMoRoom()
    {
        goto ftZsc;
        xNKIF:
        foreach ($data as $k => $v) {
            goto c3lA7;
            IJUsH:
            n6I0Y:
            goto u0TdW;
            FepPt:
            $room[] = $v;
            goto IJUsH;
            c3lA7:
            if (!in_array($bid, explode(",", $v["build_id"]))) {
                goto n6I0Y;
            }
            goto FepPt;
            u0TdW:
            bUqgi:
            goto Umtld;
            Umtld:
        }
        goto BvHhk;
        Xmgv5:
        $data = pdo_getall("ymktv_sun_goods", array("uniacid" => $_W["uniacid"], "type_id" => $type[0]["id"]), '', '', "sort DESC");
        goto HizQn;
        fkqxW:
        echo json_encode($room);
        goto TU_qz;
        HizQn:
        $room = array();
        goto xNKIF;
        BvHhk:
        QgVpj:
        goto fkqxW;
        UfhAI:
        $type = pdo_getall("ymktv_sun_type", array("uniacid" => $_W["uniacid"]), '', '', "sort DESC");
        goto Xmgv5;
        ftZsc:
        global $_W, $_GPC;
        goto edKEJ;
        edKEJ:
        $bid = $_GPC["bid"];
        goto UfhAI;
        TU_qz:
    }
    public function doPageRoomData()
    {
        goto kYYqD;
        rLDke:
        $data = pdo_getall("ymktv_sun_goods", array("uniacid" => $_W["uniacid"], "type_id" => $id), '', '', "sort DESC");
        goto u_aIi;
        kYYqD:
        global $_GPC, $_W;
        goto KgRUq;
        KgRUq:
        $id = $_GPC["id"];
        goto pezV_;
        u_aIi:
        $room = array();
        goto DXd3j;
        Tie5_:
        echo json_encode($room);
        goto SYzZq;
        gCCor:
        YTnyl:
        goto Tie5_;
        DXd3j:
        foreach ($data as $k => $v) {
            goto CcQ34;
            Ms5S3:
            CCjMy:
            goto gzzUS;
            IqJSa:
            lLhUP:
            goto Ms5S3;
            Z79No:
            $room[] = $v;
            goto IqJSa;
            CcQ34:
            if (!in_array($bid, explode(",", $v["build_id"]))) {
                goto lLhUP;
            }
            goto Z79No;
            gzzUS:
        }
        goto gCCor;
        pezV_:
        $bid = $_GPC["bid"];
        goto rLDke;
        SYzZq:
    }
    public function doPageRoomDetails()
    {
        goto PQzsX;
        f7GcE:
        $data["shichang"] = explode(",", $data["subscribe_duration"]);
        goto NNl2B;
        NNl2B:
        echo json_encode($data);
        goto B3LN8;
        PQzsX:
        global $_GPC, $_W;
        goto JDsUu;
        JDsUu:
        $id = $_GPC["id"];
        goto mib8T;
        kQ4rx:
        $data["imgs"] = explode(",", $data["imgs"]);
        goto f7GcE;
        mib8T:
        $data = pdo_get("ymktv_sun_goods", array("uniacid" => $_W["uniacid"], "id" => $id));
        goto kQ4rx;
        B3LN8:
    }
    public function doPagedrinktype()
    {
        goto VPSzM;
        agcjQ:
        $data = pdo_getall("ymktv_sun_drinktype", array("uniacid" => $_W["uniacid"]), '', '', "sort DESC");
        goto gRGr_;
        gRGr_:
        echo json_encode($data);
        goto SoBSb;
        VPSzM:
        global $_W, $_GPC;
        goto agcjQ;
        SoBSb:
    }
    public function doPageDrinkMo()
    {
        goto EKcaS;
        X30Eo:
        $data = array();
        goto srR_g;
        eESf6:
        $bid = $_GPC["bid"];
        goto GQZ2l;
        m1Oba:
        echo json_encode($data);
        goto Kb7WE;
        GQZ2l:
        $id = pdo_getall("ymktv_sun_drinktype", array("uniacid" => $_W["uniacid"]), '', '', "sort DESC");
        goto Pzspd;
        qBTyV:
        fGnM5:
        goto m1Oba;
        jZfws:
        foreach ($data as $k => $v) {
            $data[$k]["imgs"] = explode(",", $v["imgs"]);
            ZGlmV:
        }
        goto qBTyV;
        EKcaS:
        global $_GPC, $_W;
        goto eESf6;
        AnD6B:
        EWQpk:
        goto jZfws;
        srR_g:
        foreach ($drink as $k => $v) {
            goto UchsX;
            UchsX:
            if (!in_array($bid, explode(",", $v["build_id"]))) {
                goto EUVJ6;
            }
            goto SPZSK;
            SPZSK:
            $data[] = $v;
            goto x4C6v;
            x4C6v:
            EUVJ6:
            goto CsKqm;
            CsKqm:
            eFIQh:
            goto fg9dy;
            fg9dy:
        }
        goto AnD6B;
        Pzspd:
        $drink = pdo_getall("ymktv_sun_drinks", array("uniacid" => $_W["uniacid"], "dt_id" => $id[0]["dtid"]), '', '', "sort DESC");
        goto X30Eo;
        Kb7WE:
    }
	/*new*/
	public function doPagedrinkindex(){ 
		global $_GPC, $_W;
		$data = array();
		$bid = $_GPC["bid"];
		$id = pdo_getall("ymktv_sun_drinktype", array("uniacid" => $_W["uniacid"]), '', '', "sort DESC");
$data = $id;
		foreach($id as $k => $v){
$data[$k]['data'] = array();
			$drink = pdo_getall("ymktv_sun_drinks", array("uniacid" => $_W["uniacid"], "build_id" => $bid,"is_on" => 1), '', '', "sort DESC");
			$num = 0;
			foreach ($drink as $key => $val) {

				if($val['dt_id'] == $v['dtid']){
					$data[$k]['data'][$num] = $val;
					$data[$k]["imgs"] = explode(",", $val["imgs"]);
					$num++;
				}
			}

//			foreach ($data as $k => $v) {
//
//			}


		}
//		var_dump($data);die;
//var_dump($id);die;
		echo json_encode($data);

	}

    public function doPageDrinkTypeData()
    {
        goto WGczr;
        l4wUS:
        $drink = array();
        goto TjOiW;
        TmyuI:
        n4NZ_:
        goto l4wUS;
        qOrwv:
        foreach ($data as $k => $v) {
            $data[$k]["imgs"] = explode(",", $v["imgs"]);
            vdpZM:
        }
        goto TmyuI;
        TjOiW:
        foreach ($data as $k => $v) {
            goto CS53F;
            ar2VJ:
            $drink[] = $v;
            goto ir7vL;
            ir7vL:
            G5vZX:
            goto OtmFq;
            OtmFq:
            Kn4lI:
            goto E3hYv;
            CS53F:
            if (!in_array($bid, explode(",", $v["build_id"]))) {
                goto G5vZX;
            }
            goto ar2VJ;
            E3hYv:
        }
        goto xS0fq;
        xS0fq:
        PeprJ:
        goto cAn4e;
        WGczr:
        global $_GPC, $_W;
        goto pcawp;
        pcawp:
        $dtid = $_GPC["dtid"];
        goto hLV87;
        pff11:
        $data = pdo_getall("ymktv_sun_drinks", array("uniacid" => $_W["uniacid"], "dt_id" => $dtid), '', '', "sort DESC");
        goto qOrwv;
        cAn4e:
        echo json_encode($drink);
        goto rLB0Y;
        hLV87:
        $bid = $_GPC["bid"];
        goto pff11;
        rLB0Y:
    }
    public function doPagedrinkIdData()
    {
        goto z7LrV;
        HirH1:
        echo json_encode($data);
        goto crEuX;
        yJtvv:
        $id = $_GPC["id"];
        goto JtL7p;
        fRoHi:
        $data["imgs"] = explode(",", $data["imgs"]);
        goto HirH1;
        JtL7p:
        $data = pdo_get("ymktv_sun_drinks", array("uniacid" => $_W["uniacid"], "id" => $id));
        goto fRoHi;
        z7LrV:
        global $_W, $_GPC;
        goto yJtvv;
        crEuX:
    }
    public function doPageLengthtime()
    {
        goto qT0lg;
        qT0lg:
        global $_GPC, $_W;
        goto RQls2;
        wIYaT:
        Lzd19:
        goto P_oxt;
        f5gNE:
        $or = array();
        goto UNdup;
        nrpbI:
        $good = pdo_get("ymktv_sun_goods", array("uniacid" => $_W["uniacid"], "id" => $gid));
        goto gZgFb;
        tK_Zi:
        $a = 0;
        goto JzNfm;
        odOSl:
        $a = 1;
        goto TClQo;
        TClQo:
        yzZlN:
        goto u2Xdd;
        U1lAP:
        echo json_encode($data);
        goto GWggC;
        gZgFb:
        $order = pdo_getall("ymktv_sun_roomorder", array("uniacid" => $_W["uniacid"], "gid" => $gid, "build_id" => $bid));
        goto f5gNE;
        lburj:
        $gid = $_GPC["gid"];
        goto GjflM;
        DLqEn:
        if (date("Y-m-d", $dateArrays_time / 1000) == date("Y-m-d", $gettime / 1000)) {
            goto WqKUk;
        }
        goto tK_Zi;
        UNdup:
        foreach ($order as $k => $v) {
            goto C_jtl;
            x5Nxs:
            gXjAs:
            goto RuaR7;
            q7c1d:
            $or[] = $v;
            goto x5Nxs;
            RuaR7:
            VUd2K:
            goto cPub6;
            C_jtl:
            if (!(date("Y-m-d", $v["timeData"] / 1000) == date("Y-m-d", $dateArrays_time / 1000))) {
                goto gXjAs;
            }
            goto q7c1d;
            cPub6:
        }
        goto zEmac;
        bBKkS:
        $gettime = $_GPC["gettime"];
        goto DLqEn;
        RQls2:
        $spec = $_GPC["spec"];
        goto lburj;
        X64aO:
        $good["goods_valc"] = $good["goods_valc"] + 24;
        goto wIYaT;
        KzDxx:
        WqKUk:
        goto odOSl;
        GjflM:
        $bid = $_GPC["bid"];
        goto X2Z0L;
        u2Xdd:
        $spec = pdo_getcolumn("ymktv_sun_specprice", array("uniacid" => $_W["uniacid"], "gid" => $gid, "spec" => $spec), "price");
        goto nrpbI;
        X2Z0L:
        $dateArrays_time = $_GPC["dateArrays_time"];
        goto bBKkS;
        JzNfm:
        goto yzZlN;
        goto KzDxx;
        P_oxt:
        $data = array("price" => $spec, "gid" => $gid, "valb" => $good["goods_valb"], "valc" => $good["goods_valc"], "or" => $or, "a" => $a);
        goto U1lAP;
        tUEMv:
        if (!($good["date_dc"] == 2)) {
            goto Lzd19;
        }
        goto X64aO;
        zEmac:
        Fp0xE:
        goto tUEMv;
        GWggC:
    }
    public function doPageCartData()
    {
        goto ACzL0;
        m2Wve:
        $id = $_GPC["id"];
        goto hnNG9;
        gbtCP:
        $openid = $_GPC["openid"];
        goto HAGwz;
        jMAVL:
        $num = $_GPC["num"];
        goto gbtCP;
        Fe2OG:
        $res = pdo_insert("ymktv_sun_carts", $data);
        goto rzo03;
        ACzL0:
        global $_GPC, $_W;
        goto m2Wve;
        rzo03:
        echo json_encode($res);
        goto JSA_H;
        HAGwz:
        $data = array("d_id" => $id, "build_id" => $bid, "uniacid" => $_W["uniacid"], "num" => $num, "openid" => $openid, "cr_time" => date("Y-m-d H:i:s", time()));
        goto Fe2OG;
        hnNG9:
        $bid = $_GPC["bid"];
        goto jMAVL;
        JSA_H:
    }
    public function doPageHaveCart()
    {
        goto wgUPv;
        wgUPv:
        global $_GPC, $_W;
        goto YarwW;
        wIzPd:
        echo json_encode($data);
        goto gGmRb;
        YarwW:
        $openid = $_GPC["openid"];
        goto O6KYs;
        dlcb1:
        $sql = " SELECT * FROM " . tablename("ymktv_sun_drinks") . " d " . " JOIN " . tablename("ymktv_sun_carts") . " c " . " ON " . " d.id=c.d_id" . " WHERE " . " d.uniacid=" . $_W["uniacid"] . " AND " . " c.openid=" . "'{$openid}'" . " and c.build_id=" . $bid . " ORDER BY " . " cr_time DESC";
        goto Twtpw;
        KQIuK:
        p5wSX:
        goto wIzPd;
        Twtpw:
        $data = pdo_fetchall($sql);
        goto TTPyb;
        TTPyb:
        foreach ($data as $k => $v) {
            goto CGXmX;
            CE37K:
            Ztwp2:
            goto FQ4Bl;
            YW3uh:
            $data[$k]["status"] = 1;
            goto CE37K;
            CGXmX:
            $data[$k]["numvalue"] = $v["num"];
            goto YW3uh;
            FQ4Bl:
        }
        goto KQIuK;
        O6KYs:
        $bid = $_GPC["bid"];
        goto dlcb1;
        gGmRb:
    }
    public function doPageDeleteCart()
    {
        goto JrLTX;
        JrLTX:
        global $_GPC, $_W;
        goto XZfvy;
        sp4vV:
        echo json_encode($res);
        goto cJ8A0;
        bAoEa:
        $res = pdo_delete("ymktv_sun_carts", array("uniacid" => $_W["uniacid"], "crid" => $crid));
        goto sp4vV;
        XZfvy:
        $crid = $_GPC["crid"];
        goto bAoEa;
        cJ8A0:
    }
    public function doPageCartPayData()
    {
        goto jFEvo;
        WvuRY:
        $id = $_GPC["id"];
        goto V1O2N;
        ozbpx:
        $data = pdo_getall("ymktv_sun_drinks", array("uniacid" => $_W["uniacid"], "id" => $id));
        goto FBi7I;
        V1O2N:
        $num = $_GPC["num"];
        goto yHbgJ;
        ETq3V:
        $ids = $_GPC["ids"];
        goto WvuRY;
        ZkOiA:
        GUxVp:
        goto JjXkQ;
        XGAfG:
        foreach ($data as $k => $v) {
            goto mcVVU;
            LyFNC:
            s43GP:
            goto x4QaV;
            FSOY_:
            if (!($isopen == 1)) {
                goto f7gn1;
            }
            goto YWzIa;
            ah9kd:
            mpkRp:
            goto LyFNC;
            LIb50:
            if (!($vip_open["vip_open"] == 1)) {
                goto mpkRp;
            }
            goto FSOY_;
            urNDY:
            N_4qz:
            goto yTaw2;
            hflfP:
            $data[$k]["drink_price"] = round($v["drink_price"] * $vip_open["drink_dis"] / 10, 2);
            goto urNDY;
            YWzIa:
            if (!($vip_open["drink_dis"] && $vip_open["drink_dis"] != 0)) {
                goto N_4qz;
            }
            goto hflfP;
            yTaw2:
            f7gn1:
            goto ah9kd;
            mcVVU:
            $data[$k]["integral"] = $v["drink_price"] * $v["num"] * $integral;
            goto LIb50;
            x4QaV:
        }
        goto JdvhU;
        P6ZnV:
        $data = array();
        goto K3_Ld;
        ZeNRB:
        $isopen = pdo_getcolumn("ymktv_sun_vipopen", array("uniacid" => $_W["uniacid"], "openid" => $openid), "isopen");
        goto XGAfG;
        jFEvo:
        global $_GPC, $_W;
        goto oL1mH;
        YmYkO:
        aNurT:
        goto gQ0DR;
        zJ6YX:
        taSWn:
        goto YmYkO;
        oL1mH:
        $openid = $_GPC["openid"];
        goto ETq3V;
        PAqI4:
        echo json_encode($data);
        goto zaQjV;
        gQ0DR:
        $vip_open = pdo_get("ymktv_sun_vip_open", array("uniacid" => $_W["uniacid"]));
        goto ZeNRB;
        FBi7I:
        foreach ($data as $k => $v) {
            $data[$k]["num"] = $num;
            ORnlB:
        }
        goto zJ6YX;
        K3_Ld:
        foreach ($ids as $k => $v) {
            goto pTiO4;
            pTiO4:
            $sql = " SELECT * FROM " . tablename("ymktv_sun_carts") . " c " . " JOIN " . tablename("ymktv_sun_drinks") . " d " . " ON " . " c.d_id=d.id" . " WHERE " . " c.uniacid=" . $_W["uniacid"] . " AND " . " c.crid=" . $v;
            goto lSh0m;
            lSh0m:
            $data[] = pdo_fetch($sql);
            goto fC1CL;
            fC1CL:
            xIiTy:
            goto e82hc;
            e82hc:
        }
        goto uOuvh;
        MmULX:
        $ids = explode(",", $ids);
        goto P6ZnV;
        ROSXt:
        if (!($ids != "undefined")) {
            goto GUxVp;
        }
        goto MmULX;
        uOuvh:
        LFeMa:
        goto ZkOiA;
        JdvhU:
        DCHJC:
        goto PAqI4;
        yHbgJ:
        $integral = pdo_getcolumn("ymktv_sun_system", array("uniacid" => $_W["uniacid"]), "integral");
        goto ROSXt;
        JjXkQ:
        if (!($id != "undefined")) {
            goto aNurT;
        }
        goto ozbpx;
        zaQjV:
    }
    public function doPageUserIsVip()
    {
        goto Xu2Jz;
        xummR:
        $openid = $_GPC["openid"];
        goto THitW;
        RjtN9:
        echo json_encode($open);
        goto Nfw_A;
        Xu2Jz:
        global $_W, $_GPC;
        goto xummR;
        THitW:
        $open = pdo_getcolumn("ymktv_sun_vipopen", array("uniacid" => $_W["uniacid"], "openid" => $openid), "isopen");
        goto RjtN9;
        Nfw_A:
    }
    public function doPageUserVipData()
    {
        goto K8Vcd;
        Kfef_:
        $vipdetails = pdo_getcolumn("ymktv_sun_vip_open", array("uniacid" => $_W["uniacid"]), "vip_details");
        goto NezWO;
        NezWO:
        $newData = array("balance" => $balance, "endtime" => $endtime, "vipwelf" => $vipwelf, "vipdetails" => $vipdetails);
        goto E2OYk;
        fmxE3:
        if ($balance) {
            goto LGZ4C;
        }
        goto h1vIq;
        K8Vcd:
        global $_W, $_GPC;
        goto gd2WY;
        gd2WY:
        $openid = $_GPC["openid"];
        goto xwe77;
        gW7vj:
        LGZ4C:
        goto wIO45;
        ukryR:
        $vipwelf = pdo_getall("ymktv_sun_vipwelfare", array("uniacid" => $_W["uniacid"]), '', '', "addtime DESC");
        goto Kfef_;
        h1vIq:
        $balance = 0;
        goto gW7vj;
        wIO45:
        $endtime = date("Y-m-d H:i:s", pdo_getcolumn("ymktv_sun_vipopen", array("uniacid" => $_W["uniacid"], "openid" => $openid), "end_time"));
        goto ukryR;
        E2OYk:
        echo json_encode($newData);
        goto d2aX0;
        xwe77:
        $balance = pdo_getcolumn("ymktv_sun_user_balance", array("uniacid" => $_W["uniacid"], "openid" => $openid), "money");
        goto fmxE3;
        d2aX0:
    }
    public function dopageroomDatas()
    {
        goto tMKGc;
        B1gio:
        foreach ($data as $k => $v) {
            goto Dgwer;
            O7HdX:
            E8LCG:
            goto qigK9;
            Dgwer:
            if (!in_array($bid, explode(",", $v["build_id"]))) {
                goto c_4VV;
            }
            goto sLdbD;
            sLdbD:
            $room[] = $v;
            goto bj73h;
            bj73h:
            c_4VV:
            goto O7HdX;
            qigK9:
        }
        goto w06vY;
        D2yRD:
        $bid = $_GPC["bid"];
        goto MK5ts;
        ELe5h:
        $room = array();
        goto B1gio;
        w06vY:
        if9AR:
        goto UEWJT;
        UEWJT:
        echo json_encode($room);
        goto ENqBs;
        MK5ts:
        $data = pdo_getall("ymktv_sun_goods", array("uniacid" => $_W["uniacid"]));
        goto ELe5h;
        tMKGc:
        global $_W, $_GPC;
        goto D2yRD;
        ENqBs:
    }
    public function doPagecartnum()
    {
        goto NWaaa;
        RMcjg:
        $crid = $_GPC["crid"];
        goto K2HB3;
        K2HB3:
        $res = pdo_update("ymktv_sun_carts", array("num" => $num), array("uniacid" => $_W["uniacid"], "crid" => $crid, "openid" => $openid));
        goto dZXNk;
        dZXNk:
        echo json_encode($res);
        goto If4Ny;
        NWaaa:
        global $_W, $_GPC;
        goto edZOs;
        fX8zz:
        $num = $_GPC["num"];
        goto RMcjg;
        edZOs:
        $openid = $_GPC["openid"];
        goto fX8zz;
        If4Ny:
    }
    public function doPagePayCart()
    {
        goto p7xMO;
        GvPSb:
        $money = pdo_getcolumn("ymktv_sun_user", array("uniacid" => $_W["uniacid"], "openid" => $openid), "money");
        goto i6_G3;
        H1c7Q:
        $goodData["sb_sid"] = explode(",", $goodData["sb_sid"]);
        goto D1Uhs;
        zVWTS:
        $res = pdo_insert("ymktv_sun_order", $data);
        goto rWE6i;
        kpm9n:
        $distribution = new Distribution();
        goto uM1tG;
        PUOA2:
        if (!$res) {
            goto UELiZ;
        }
        goto f77vB;
        tHye9:
        foreach ($olol as $k => $v) {
            goto C9O7q;
            C9O7q:
            $goods_name .= $v["drink_name"] . ",";
            goto dgpC8;
            dgpC8:
            $goods_price .= $v["drink_price"] . ",";
            goto kTICt;
            JQRAC:
            $goods_id .= $v["id"] . ",";
            goto f1kYB;
            s6Y5e:
            $goods_imgs .= $v["z_imgs"] . ",";
            goto JQRAC;
            f1kYB:
            DONXx:
            goto XL0Qk;
            kTICt:
            $goods_num .= $v["num"] . ",";
            goto s6Y5e;
            XL0Qk:
        }
        goto VkBie;
        WtTLd:
        foreach ($phone as $k => $v) {
            $this->Shortmessage($v);
            mKXrs:
        }
        goto OgdYH;
        NwUQH:
        $goods_price = '';
        goto Cy4bt;
        SYWCd:
        pdo_update("ymktv_sun_user", array("money" => $money), array("uniacid" => $_W["uniacid"], "openid" => $openid));
        goto BP66W;
        dXFX1:
        $allprice = $_GPC["allprice"];
        goto ja_u9;
        OgdYH:
        BPR1x:
        goto lZbxo;
        eeOGy:
        foreach ($crid as $k => $v) {
            goto YI1bx;
            vWHOi:
            NHVrY:
            goto clFtL;
            YI1bx:
            $sql = " SELECT * FROM " . tablename("ymktv_sun_carts") . " c " . " JOIN " . tablename("ymktv_sun_drinks") . " d " . " ON " . " c.d_id=d.id" . " WHERE " . " c.crid=" . $v . " AND " . " c.uniacid=" . $_W["uniacid"];
            goto blO6v;
            blO6v:
            $olol[$k] = pdo_fetch($sql);
            goto vWHOi;
            clFtL:
        }
        goto i4II6;
        PzYvf:
        $crid = explode(",", htmlspecialchars_decode($_GPC["crid"]));
        goto dXFX1;
        NVVAL:
        aQ2CP:
        goto EdecJ;
        dleHv:
        $goods_num = '';
        goto NwUQH;
        uKBH2:
        $distribution->ordertype = 2;
        goto Zy8S1;
        iLW3N:
        goto Qze40;
        yQT3_:
        $goods_name = '';
        goto dleHv;
        i4II6:
        o1EsK:
        goto yQT3_;
        lZbxo:
        Au3dr:
        goto L_XaX;
        Zy8S1:
        $distribution->computecommission();
        goto iLW3N;
        WQPCy:
        $data = array("address" => $roomnum, "tel" => $mobile, "good_money" => rtrim($goods_price, ","), "good_num" => rtrim($goods_num, ","), "good_imgs" => rtrim($goods_imgs, ","), "good_name" => rtrim($goods_name, ","), "good_id" => rtrim($goods_id, ","), "user_id" => $openid, "money" => $allprice, "num" => $allnum, "uniacid" => $_W["uniacid"], "order_num" => date("YmdHis") . rand(1000, 9999), "pay_time" => date("Y-m-d H:i:s", time()), "status" => 0, "sid" => $sid, "build_id" => $bid, "integral" => $integral);
        goto zVWTS;
        KruD4:
        $integral = $_GPC["integral"];
        goto kmeY5;
        lMcBP:
        $sms = pdo_get("ymktv_sun_sms", array("uniacid" => $_W["uniacid"]));
        goto VoitK;
        epXC_:
        $phone = array(0 => $sms["mobile"], 1 => $mobile);
        goto VDyet;
        SlIVt:
        $olol = array();
        goto eeOGy;
        d_Edx:
        Uf62e:
        goto GvPSb;
        i6_G3:
        $money = $money + $integral;
        goto SYWCd;
        EdecJ:
        include_once IA_ROOT . "/addons/ymktv_sun/inc/func/distribution.php";
        goto kpm9n;
        ICJuG:
        $mobile = $_GPC["mobile"];
        goto KruD4;
        VDyet:
        if (!($sms["is_open"] == 1)) {
            goto Au3dr;
        }
        goto WtTLd;
        Cy4bt:
        $goods_imgs = '';
        goto eMg9d;
        rWE6i:
        $post_id = pdo_insertid();
        goto PUOA2;
        VkBie:
        gcyJz:
        goto WQPCy;
        L_XaX:
        $print = pdo_get("ymktv_sun_printing", array("uniacid" => $_W["uniacid"]));
        goto j3sI8;
        BP66W:
        $oid = pdo_getall("ymktv_sun_order", array("uniacid" => $_W["uniacid"]), '', '', "id DESC");
        goto lMcBP;
        ja_u9:
        $allnum = $_GPC["allnum"];
        goto w1WO8;
        f77vB:
        foreach ($crid as $k => $v) {
            pdo_delete("ymktv_sun_carts", array("crid" => $v));
            TCeQu:
        }
        goto d_Edx;
        uM1tG:
        $distribution->order_id = $post_id;
        goto CxuN8;
        CxuN8:
        $distribution->money = $_GPC["allprice"];
        goto rquGd;
        rquGd:
        $distribution->userid = $_GPC["openid"];
        goto uKBH2;
        Qze40:
        UELiZ:
        goto TzG35;
        w1WO8:
        $roomnum = $_GPC["roomnum"];
        goto ICJuG;
        F6_XN:
        $goodData["build_id"] = explode(",", $goodData["build_id"]);
        goto H1c7Q;
        wLEa5:
        $openid = $_GPC["openid"];
        goto PzYvf;
        AZgyY:
        MScs0:
        goto SlIVt;
        kmeY5:
        $goodData = pdo_get("ymktv_sun_goods", array("uniacid" => $_W["uniacid"], "room_num" => $roomnum));
        goto F6_XN;
        TzG35:
        echo json_encode($oid[0]);
        goto ch020;
        D1Uhs:
        foreach ($goodData["build_id"] as $k => $v) {
            goto WFiQX;
            zgu4I:
            tggRS:
            goto rFaKj;
            rFaKj:
            M_lBr:
            goto hZEN1;
            WFiQX:
            foreach ($goodData["sb_sid"] as $kk => $vv) {
                goto q_5_N;
                HZ1Nw:
                IWE7C:
                goto VGRNw;
                VGRNw:
                iDCIR:
                goto EFEKN;
                opYj6:
                $sid = $vv;
                goto HZ1Nw;
                q_5_N:
                if (!($v == $bid)) {
                    goto IWE7C;
                }
                goto opYj6;
                EFEKN:
            }
            goto zgu4I;
            hZEN1:
        }
        goto AZgyY;
        yUMLH:
        $bid = $_GPC["bid"];
        goto wLEa5;
        VoitK:
        $mobile = pdo_getcolumn("ymktv_sun_servies", array("uniacid" => $_W["uniacid"], "sid" => $sid), "mobile");
        goto epXC_;
        eMg9d:
        $goods_id = '';
        goto tHye9;
        lz6BE:
        $this->DrinkPrinting($oid[0]["id"], $bid);
        goto NVVAL;
        p7xMO:
        global $_W, $_GPC;
        goto yUMLH;
        j3sI8:
        if (!($print["is_open"] == 1)) {
            goto aQ2CP;
        }
        goto lz6BE;
        ch020:
    }
    public function doPagePayBuy()
    {
        goto eLNc3;
        XJ6W9:
        $data = array("address" => $roomnum, "tel" => $mobile, "good_money" => rtrim($goods_price, ","), "good_num" => rtrim($goods_num, ","), "good_imgs" => rtrim($goods_imgs, ","), "good_name" => rtrim($goods_name, ","), "good_id" => rtrim($goods_id, ","), "user_id" => $openid, "money" => $allprice, "num" => $allnum, "uniacid" => $_W["uniacid"], "order_num" => date("YmdHis") . rand(1000, 9999), "pay_time" => date("Y-m-d H:i:s", time()), "status" => 0, "sid" => $sid, "build_id" => $bid, "integral" => $integral);
        goto OsPPm;
        F7Bnu:
        $sms = pdo_get("ymktv_sun_sms", array("uniacid" => $_W["uniacid"]));
        goto iF9xA;
        l5l7E:
        echo json_encode($oid[0]);
        goto dOeCS;
        J4Gsv:
        n2mjw:
        goto bTv3O;
        CjBLo:
        if (!$res) {
            goto QjUHs;
        }
        goto zoTaR;
        EByfr:
        $goodData["build_id"] = explode(",", $goodData["build_id"]);
        goto oxcg1;
        ZB0Nx:
        $id = explode(",", htmlspecialchars_decode($_GPC["id"]));
        goto DBwo3;
        lxh_y:
        $distribution = new Distribution();
        goto cOCMB;
        irJfx:
        lqdnW:
        goto AzLtx;
        yVcWk:
        $openid = $_GPC["openid"];
        goto JykVc;
        AN2wb:
        $goods_imgs = '';
        goto r35Cs;
        vUa94:
        $this->DrinkPrinting($oid[0]["id"], $bid);
        goto yEqVo;
        OsPPm:
        $res = pdo_insert("ymktv_sun_order", $data);
        goto Qvawb;
        MDqrZ:
        foreach ($id as $k => $v) {
            $olol[] = pdo_get("ymktv_sun_drinks", array("id" => $v));
            k_TzK:
        }
        goto J4Gsv;
        mjC1z:
        $distribution->computecommission();
        goto CNSGW;
        bTv3O:
        $goods_name = '';
        goto V9ajm;
        Qvawb:
        $post_id = pdo_insertid();
        goto CjBLo;
        yEqVo:
        kwg8W:
        goto XrRk2;
        XPAZs:
        if (!($sms["is_open"] == 1)) {
            goto lqdnW;
        }
        goto GGezu;
        lPZls:
        if (!($print["is_open"] == 1)) {
            goto kwg8W;
        }
        goto vUa94;
        GGezu:
        foreach ($phone as $k => $v) {
            $this->Shortmessage($v);
            uv92M:
        }
        goto baCfc;
        eLNc3:
        global $_W, $_GPC;
        goto yVcWk;
        cOCMB:
        $distribution->order_id = $post_id;
        goto mgfL3;
        AzLtx:
        $print = pdo_get("ymktv_sun_printing", array("uniacid" => $_W["uniacid"]));
        goto lPZls;
        DBwo3:
        $allprice = $_GPC["allprice"];
        goto bBvQz;
        jXDvw:
        $integral = $_GPC["integral"];
        goto ZEQxm;
        dDsKc:
        foreach ($olol as $k => $v) {
            goto GMUED;
            dHp9u:
            $goods_imgs .= $v["z_imgs"] . ",";
            goto va2vp;
            IpkJR:
            $goods_num .= $allnum . ",";
            goto dHp9u;
            GMUED:
            $goods_name .= $v["drink_name"] . ",";
            goto pK3hP;
            va2vp:
            $goods_id .= $v["id"] . ",";
            goto tVoVj;
            pK3hP:
            $goods_price .= $v["drink_price"] . ",";
            goto IpkJR;
            tVoVj:
            rGpQc:
            goto FAtiO;
            FAtiO:
        }
        goto zz310;
        bUd9u:
        $oid = pdo_getall("ymktv_sun_order", array("uniacid" => $_W["uniacid"]), '', '', "id DESC");
        goto F7Bnu;
        V9ajm:
        $goods_num = '';
        goto XYMz4;
        bBvQz:
        $allnum = $_GPC["allnum"];
        goto nUjP_;
        B8hNi:
        $olol = array();
        goto MDqrZ;
        baCfc:
        Dfx1I:
        goto irJfx;
        nyRvy:
        bfLFy:
        goto B8hNi;
        zoTaR:
        $money = pdo_getcolumn("ymktv_sun_user", array("uniacid" => $_W["uniacid"], "openid" => $openid), "money");
        goto CaCuL;
        KKVAF:
        $distribution->ordertype = 2;
        goto mjC1z;
        JykVc:
        $bid = $_GPC["bid"];
        goto ZB0Nx;
        zIqkl:
        pdo_update("ymktv_sun_user", array("money" => $money), array("uniacid" => $_W["uniacid"], "openid" => $openid));
        goto bUd9u;
        IdUXo:
        QjUHs:
        goto l5l7E;
        ZEQxm:
        $goodData = pdo_get("ymktv_sun_goods", array("uniacid" => $_W["uniacid"], "room_num" => $roomnum));
        goto EByfr;
        M0nit:
        $distribution->userid = $_GPC["openid"];
        goto KKVAF;
        oxcg1:
        $goodData["sb_sid"] = explode(",", $goodData["sb_sid"]);
        goto T1svI;
        r35Cs:
        $goods_id = '';
        goto dDsKc;
        qLxRK:
        $phone = array(0 => $sms["mobile"], 1 => $mobile);
        goto XPAZs;
        XYMz4:
        $goods_price = '';
        goto AN2wb;
        iF9xA:
        $mobile = pdo_getcolumn("ymktv_sun_servies", array("uniacid" => $_W["uniacid"], "sid" => $sid), "mobile");
        goto qLxRK;
        XrRk2:
        include_once IA_ROOT . "/addons/ymktv_sun/inc/func/distribution.php";
        goto lxh_y;
        nUjP_:
        $roomnum = $_GPC["roomnum"];
        goto fI5wI;
        T1svI:
        foreach ($goodData["build_id"] as $k => $v) {
            goto IiIVb;
            lxVXg:
            Dyyu6:
            goto GpFa8;
            GpFa8:
            J7f4F:
            goto yi6sV;
            IiIVb:
            foreach ($goodData["sb_sid"] as $kk => $vv) {
                goto G4KMn;
                G4KMn:
                if (!($v == $bid)) {
                    goto pZEiG;
                }
                goto LjzBX;
                LjzBX:
                $sid = $vv;
                goto OtwIg;
                OtwIg:
                pZEiG:
                goto LZ1pS;
                LZ1pS:
                QYJmw:
                goto WRVty;
                WRVty:
            }
            goto lxVXg;
            yi6sV:
        }
        goto nyRvy;
        CNSGW:
        goto IdUXo;
        fI5wI:
        $mobile = $_GPC["mobile"];
        goto jXDvw;
        CaCuL:
        $money = $money + $integral;
        goto zIqkl;
        mgfL3:
        $distribution->money = $_GPC["allprice"];
        goto M0nit;
        zz310:
        URLU0:
        goto XJ6W9;
        dOeCS:
    }

    public function doPageOrderData()
    {
        goto heMDu;
        kPoQD:
        foreach ($data as $k => $v) {
            goto qLxQm;
            oso4h:
            $data[$k]["good_name"] = explode(",", $v["good_name"]);
            goto uWL6D;
            qLxQm:
            $data[$k]["good_money"] = explode(",", $v["good_money"]);
            goto GVLpU;
            tqfNN:
            $data[$k]["b_name"] = pdo_getcolumn("ymktv_sun_building", array("uniacid" => $_W["uniacid"], "id" => $v["build_id"]), "b_name");
            goto mUQf2;
            uWL6D:
            $data[$k]["good_id"] = explode(",", $v["good_id"]);
            goto OaWp0;
            PUJDG:
            Y5QOs:
            goto j5bm2;
            g8nPL:
            goto pXqgC;
            goto AX0rN;
            AX0rN:
            lwD8E:
            goto tqfNN;
            mUQf2:
            pXqgC:
            goto PUJDG;
            OaWp0:
            if ($v["build_id"]) {
                goto lwD8E;
            }
            goto G0Zfs;
            G0Zfs:
            $data[$k]["b_name"] = '';
            goto g8nPL;
            GVLpU:
            $data[$k]["good_num"] = explode(",", $v["good_num"]);
            goto KxbfK;
            KxbfK:
            $data[$k]["good_imgs"] = explode(",", $v["good_imgs"]);
            goto oso4h;
            j5bm2:
        }
        goto PsY8N;
        PsY8N:
        BDZB7:
        goto SCikD;
        SCikD:
        echo json_encode($data);
        goto ZmrMF;
        Gn5KY:
        $data = pdo_getall("ymktv_sun_order", array("uniacid" => $_W["uniacid"], "user_id" => $openid, "build_id" => $bid), '', '', "pay_time DESC");
        goto kPoQD;
        zNu8o:
        $openid = $_GPC["openid"];
        goto NG9hh;
        NG9hh:
        $bid = $_GPC["bid"];
        goto Gn5KY;
        heMDu:
        global $_GPC, $_W;
        goto zNu8o;
        ZmrMF:
    }
    public function doPagewOrderData()
    {
        goto POYHG;
        QK7ls:
        $data = pdo_getall("ymktv_sun_order", array("uniacid" => $_W["uniacid"], "user_id" => $openid, "status" => 0, "build_id" => $bid), '', '', "pay_time DESC");
        goto AMQ5j;
        POYHG:
        global $_GPC, $_W;
        goto COtwh;
        Sq3Cw:
        $bid = $_GPC["bid"];
        goto QK7ls;
        HSFN1:
        echo json_encode($data);
        goto u7do7;
        AMQ5j:
        foreach ($data as $k => $v) {
            goto Ui6uz;
            plLaV:
            $data[$k]["b_name"] = pdo_getcolumn("ymktv_sun_building", array("uniacid" => $_W["uniacid"], "id" => $v["build_id"]), "b_name");
            goto ZyU2G;
            n1lI8:
            $data[$k]["good_num"] = explode(",", $v["good_num"]);
            goto nJykC;
            nJykC:
            $data[$k]["good_imgs"] = explode(",", $v["good_imgs"]);
            goto sEAGT;
            GqTEF:
            goto AK6SN;
            goto RnjpR;
            Ol3Ib:
            if ($v["build_id"]) {
                goto ztfiH;
            }
            goto J7B_Z;
            J7B_Z:
            $data[$k]["b_name"] = '';
            goto GqTEF;
            RnjpR:
            ztfiH:
            goto plLaV;
            ZyU2G:
            AK6SN:
            goto PzmfB;
            WkHCP:
            $data[$k]["good_id"] = explode(",", $v["good_id"]);
            goto Ol3Ib;
            PzmfB:
            VL2Rb:
            goto EsDXt;
            Ui6uz:
            $data[$k]["good_money"] = explode(",", $v["good_money"]);
            goto n1lI8;
            sEAGT:
            $data[$k]["good_name"] = explode(",", $v["good_name"]);
            goto WkHCP;
            EsDXt:
        }
        goto PPLYv;
        PPLYv:
        gBIo4:
        goto HSFN1;
        COtwh:
        $openid = $_GPC["openid"];
        goto Sq3Cw;
        u7do7:
    }
    public function doPageyOrderData()
    {
        goto paNLA;
        ZTP8K:
        foreach ($data as $k => $v) {
            goto LWEoZ;
            WXRjz:
            $data[$k]["good_num"] = explode(",", $v["good_num"]);
            goto rpvt6;
            p7J8y:
            $data[$k]["good_name"] = explode(",", $v["good_name"]);
            goto ghG51;
            dgmCw:
            $data[$k]["b_name"] = '';
            goto HQ08f;
            qyYdB:
            rx1ck:
            goto REamM;
            rpvt6:
            $data[$k]["good_imgs"] = explode(",", $v["good_imgs"]);
            goto p7J8y;
            LWEoZ:
            $data[$k]["good_money"] = explode(",", $v["good_money"]);
            goto WXRjz;
            p7GMC:
            rFJYM:
            goto v1IFY;
            lzaOp:
            if ($v["build_id"]) {
                goto rx1ck;
            }
            goto dgmCw;
            HQ08f:
            goto q71bI;
            goto qyYdB;
            ghG51:
            $data[$k]["good_id"] = explode(",", $v["good_id"]);
            goto lzaOp;
            ATa8t:
            q71bI:
            goto p7GMC;
            REamM:
            $data[$k]["b_name"] = pdo_getcolumn("ymktv_sun_building", array("uniacid" => $_W["uniacid"], "id" => $v["build_id"]), "b_name");
            goto ATa8t;
            v1IFY:
        }
        goto siawO;
        siawO:
        ZYkX2:
        goto GV2Eg;
        GV2Eg:
        echo json_encode($data);
        goto aPyPN;
        GOCQp:
        $bid = $_GPC["bid"];
        goto M_u73;
        paNLA:
        global $_GPC, $_W;
        goto vecMA;
        vecMA:
        $openid = $_GPC["openid"];
        goto GOCQp;
        M_u73:
        $data = pdo_getall("ymktv_sun_order", array("uniacid" => $_W["uniacid"], "user_id" => $openid, "status" => 1, "build_id" => $bid), '', '', "pay_time DESC");
        goto ZTP8K;
        aPyPN:
    }

    public function dopagedeldrink()
    {
        goto pGkVP;
        pGkVP:
        global $_W, $_GPC;
        goto VSPOj;
        gXAfn:
        $openid = $_GPC["openid"];
        goto N6l2J;
        N6l2J:
        $res = pdo_delete("ymktv_sun_order", array("uniacid" => $_W["uniacid"], "id" => $id, "user_id" => $openid));
        goto rpYO1;
        rpYO1:
        echo json_encode($res);
        goto kT9dx;
        VSPOj:
        $id = $_GPC["id"];
        goto gXAfn;
        kT9dx:
    }
    public function doPagecompletions()
    {
        goto yaibo;
        DJpT4:
        include_once IA_ROOT . "/addons/ymktv_sun/inc/func/distribution.php";
        goto W8d5L;
        L6JKH:
        $distribution->ordertype = 2;
        goto cx_aN;
        kZrxp:
        $res = pdo_update("ymktv_sun_order", array("status" => 1), array("uniacid" => $_W["uniacid"], "id" => $id));
        goto ftOEl;
        cx_aN:
        $distribution->settlecommission();
        goto yeNhh;
        xpG2M:
        $distribution->order_id = $_GPC["id"];
        goto L6JKH;
        yaibo:
        global $_GPC, $_W;
        goto AKXdO;
        ftOEl:
        if (!$res) {
            goto cgl1n;
        }
        goto DJpT4;
        AKXdO:
        $id = $_GPC["id"];
        goto kZrxp;
        W8d5L:
        $distribution = new Distribution();
        goto xpG2M;
        COedI:
        cgl1n:
        goto W562j;
        yeNhh:
        goto COedI;
        W562j:
        echo json_encode($res);
        goto AUn0E;
        AUn0E:
    }
    public function doPagecompletion()
    {
        goto kC0kH;
        PhKjd:
        if (!$res) {
            goto TJzc7;
        }
        goto WD7FG;
        Easxd:
        $id = $_GPC["id"];
        goto UfXad;
        kC0kH:
        global $_GPC, $_W;
        goto Easxd;
        CJ9d3:
        goto YT1Yg;
        KaAut:
        $distribution->settlecommission();
        goto CJ9d3;
        YT1Yg:
        TJzc7:
        goto ZD3pv;
        MGceG:
        $distribution->order_id = $_GPC["id"];
        goto pIn5l;
        ZD3pv:
        echo json_encode($res);
        goto ewhDU;
        UfXad:
        $res = pdo_update("ymktv_sun_roomorder", array("status" => 1), array("uniacid" => $_W["uniacid"], "id" => $id));
        goto PhKjd;
        IzcPc:
        $distribution = new Distribution();
        goto MGceG;
        pIn5l:
        $distribution->ordertype = 1;
        goto KaAut;
        WD7FG:
        include_once IA_ROOT . "/addons/ymktv_sun/inc/func/distribution.php";
        goto IzcPc;
        ewhDU:
    }
    public function doPagecompletiont()
    {
        goto u_WTm;
        lkPzb:
        $id = $_GPC["id"];
        goto MEq1S;
        h1ZIC:
        echo json_encode($res);
        goto f78Hw;
        MEq1S:
        $res = pdo_update("ymktv_sun_gift_order", array("status" => 1), array("uniacid" => $_W["uniacid"], "id" => $id));
        goto h1ZIC;
        u_WTm:
        global $_GPC, $_W;
        goto lkPzb;
        f78Hw:
    }
    public function doPageRoomorder()
    {
        goto LJIz7;
        S_t0L:
        $phone = array(0 => $build["mobile"], 1 => $mobile);
        goto MSUWA;
        nf7BU:
        $newuseAtime = $_GPC["newuseAtime"];
        goto Mq4hl;
        Hcq5d:
        $openid = $_GPC["openid"];
        goto hoasx;
        rb2J8:
        $good["sb_sid"] = explode(",", $good["sb_sid"]);
        goto a313s;
        uPMIV:
        goto jXbOk;
        Y_G6A:
        $distribution->userid = $_GPC["openid"];
        goto RVBcA;
        AC1LM:
        $date_cr = $_GPC["date_cr"];
        goto R3mKL;
        ucrOx:
        include_once IA_ROOT . "/addons/ymktv_sun/inc/func/distribution.php";
        goto Sy85T;
        TNTuq:
        $integral = $_GPC["integral"];
        goto fOVI_;
        OvrVq:
        $date_dr = $_GPC["date_dr"];
        goto AC1LM;
        hoasx:
        $gid = $_GPC["gid"];
        goto HGdaN;
        uUG_u:
        $order_id = $oid[0]["id"];
        goto C4lmq;
        zHTEZ:
        goto H8aLh;
        goto NfbMj;
        IVf7u:
        if (!$res) {
            goto AhdQW;
        }
        goto bo4G1;
        kmDTV:
        $sid = $_GPC["sid"];
        goto NWE2u;
        bo4G1:
        $money = pdo_getcolumn("ymktv_sun_user", array("uniacid" => $_W["uniacid"], "openid" => $openid), "money");
        goto n25hH;
        jXbOk:
        AhdQW:
        goto OLkE_;
        d3qCk:
        $good["build_id"] = explode(",", $good["build_id"]);
        goto rb2J8;
        A6J55:
        $distribution->money = $_GPC["price"];
        goto Y_G6A;
        R3mKL:
        $mobile = $_GPC["mobile"];
        goto Eub84;
        lkOTk:
        if ($_GPC["bid"] == 0) {
            goto ZgTN2;
        }
        goto ivW04;
        lh9T7:
        P_tH2:
        goto oD3P_;
        VgqEo:
        $dateArrays_time = $_GPC["dateArrays_time"];
        goto nf7BU;
        K_1Bk:
        $this->Printing($order_id, $bid);
        goto ilKiZ;
        fOVI_:
        $bid = $_GPC["bid"];
        goto lkOTk;
        SOiT7:
        $mobile = pdo_getcolumn("ymktv_sun_servies", array("uniacid" => $_W["uniacid"], "sid" => $sid), "mobile");
        goto S_t0L;
        t1eY6:
        $phone = array(0 => $sms["mobile"], 1 => $mobile);
        goto apF3Y;
        MxkX3:
        Qklas:
        goto ucrOx;
        n25hH:
        $money = $money + $integral;
        goto FGr3W;
        ilKiZ:
        BhrQ4:
        goto lh9T7;
        OsEdK:
        $mobile = pdo_getcolumn("ymktv_sun_servies", array("uniacid" => $_W["uniacid"], "sid" => $sid), "mobile");
        goto t1eY6;
        Eub84:
        $remark = $_GPC["remark"];
        goto TNTuq;
        vAp4m:
        if (!($printing["is_open"] == 1)) {
            goto BhrQ4;
        }
        goto K_1Bk;
        ElDXc:
        foreach ($phone as $k => $v) {
            $this->Shortmessage($v);
            n7czi:
        }
        goto i5sLZ;
        LJIz7:
        global $_W, $_GPC;
        goto Hcq5d;
        EDA3H:
        if (!($printing["is_open"] == 1)) {
            goto Qklas;
        }
        goto gACmX;
        r59iH:
        $post_id = pdo_insertid();
        goto IVf7u;
        Mq4hl:
        $newuseNtime = $_GPC["newuseNtime"];
        goto OvrVq;
        ivW04:
        $good = pdo_get("ymktv_sun_goods", array("uniacid" => $_W["uniacid"], "id" => $gid));
        goto d3qCk;
        FGr3W:
        pdo_update("ymktv_sun_user", array("money" => $money), array("uniacid" => $_W["uniacid"], "openid" => $openid));
        goto pC5F0;
        oD3P_:
        if (!($sms["is_open"] == 1)) {
            goto zYBnw;
        }
        goto ElDXc;
        i5sLZ:
        uw0A9:
        goto cj8yc;
        apF3Y:
        $printing = pdo_get("ymktv_sun_printing", array("uniacid" => $_W["uniacid"]));
        goto vAp4m;
        AZ2r0:
        $res = pdo_insert("ymktv_sun_roomorder", $data);
        goto r59iH;
        jfPsF:
        $printing = pdo_get("ymktv_sun_printing", array("uniacid" => $_W["uniacid"]));
        goto EDA3H;
        C4lmq:
        $sms = pdo_get("ymktv_sun_sms", array("uniacid" => $_W["uniacid"]));
        goto CWV6v;
        pC5F0:
        $oid = pdo_getall("ymktv_sun_roomorder", array("uniacid" => $_W["uniacid"]), '', '', "id DESC");
        goto uUG_u;
        a313s:
        $newgood = array();
        goto zQc1_;
        HGdaN:
        $price = $_GPC["price"];
        goto VgqEo;
        iuwAW:
        $data = array("openid" => $openid, "gid" => $gid, "price" => $price, "timeData" => $dateArrays_time, "timie" => $newuseAtime, "times" => $newuseNtime, "date_dr" => $date_dr, "date_cr" => $date_cr, "mobile" => $mobile, "remark" => $remark, "uniacid" => $_W["uniacid"], "order_num" => date("YmdHis") . rand(1000, 9999), "time" => time(), "status" => 0, "sid" => $sid, "build_id" => $bid, "integral" => $integral);
        goto AZ2r0;
        aitCL:
        zdDF9:
        goto OsEdK;
        XdpuE:
        $distribution->order_id = $post_id;
        goto A6J55;
        zQc1_:
        foreach ($good["build_id"] as $k => $v) {
            goto MVa1n;
            JGJUT:
            mzWVB:
            goto TscJ8;
            MVa1n:
            foreach ($good["sb_sid"] as $kk => $vv) {
                goto IvNwL;
                GZiZp:
                fDjmo:
                goto ALGLK;
                ALGLK:
                AYtWh:
                goto HKLFH;
                BnUSJ:
                $newgood[$v][] = $vv;
                goto GZiZp;
                IvNwL:
                if (!($kk == $k)) {
                    goto fDjmo;
                }
                goto BnUSJ;
                HKLFH:
            }
            goto JGJUT;
            TscJ8:
            HCudC:
            goto Rrj5Y;
            Rrj5Y:
        }
        goto ZMK4P;
        ZMK4P:
        k9Sc6:
        goto W6k4v;
        MSUWA:
        goto P_tH2;
        goto aitCL;
        kndpK:
        $distribution->computecommission();
        goto uPMIV;
        NWE2u:
        H8aLh:
        goto iuwAW;
        RVBcA:
        $distribution->ordertype = 1;
        goto kndpK;
        CWV6v:
        if ($bid == 0) {
            goto zdDF9;
        }
        goto DO2Wb;
        DO2Wb:
        $build = pdo_get("branchhead", array("uniacid" => $_W["uniacid"], "b_id" => $bid));
        goto SOiT7;
        Sy85T:
        $distribution = new Distribution();
        goto XdpuE;
        OLkE_:
        echo json_encode($oid[0]);
        goto KEIoQ;
        W6k4v:
        $sid = implode(",", $newgood[$bid]);
        goto zHTEZ;
        NfbMj:
        ZgTN2:
        goto kmDTV;
        cj8yc:
        zYBnw:
        goto jfPsF;
        gACmX:
        $this->Printing($order_id, $bid);
        goto MxkX3;
        KEIoQ:
    }
    function Shortmessage($mobile)
    {
        goto qn4PC;
        bd07a:
        $sendUrl = "http://v.juhe.cn/sms/send";
        goto psBcx;
        cPh3m:
        $smsConf = array("key" => $sms["appkey"], "mobile" => $mobile, "tpl_id" => $sms["tpl_id"], "tpl_value" => "#code#=1234&#company#=聚合数据");
        goto XKsz3;
        qn4PC:
        global $_GPC, $_W;
        goto LNQH2;
        U8sGn:
        goto yvfP7;
        psBcx:
        $sms = pdo_get("ymktv_sun_sms", array("uniacid" => $_W["uniacid"]));
        goto cPh3m;
        XKsz3:
        $content = $this->juhecurl($sendUrl, $smsConf, 1);
        goto U8sGn;
        LNQH2:
        header("content-type:text/html;charset=utf-8");
        goto bd07a;
        yvfP7:
    }
    function juhecurl($url, $params = false, $ispost = 0)
    {
        goto Naqes;
        hxCqO:
        $httpInfo = array_merge($httpInfo, curl_getinfo($ch));
        goto MugVc;
        cksI8:
        goto lTNZE;
        goto T7BGc;
        GLKva:
        if ($ispost) {
            goto vVdRa;
        }
        goto exzjt;
        NR94_:
        $ch = curl_init();
        goto Bocep;
        fQd3l:
        curl_setopt($ch, CURLOPT_URL, $url . "?" . $params);
        goto aVXEG;
        MugVc:
        curl_close($ch);
        goto necSu;
        necSu:
        return $response;
        goto h7fp7;
        fUT1p:
        if (!($response === FALSE)) {
            goto c2z4w;
        }
        goto MeLRI;
        Bocep:
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        goto nFVmV;
        yqTFi:
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        goto GLKva;
        UaXYa:
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        goto hxCqO;
        exzjt:
        if ($params) {
            goto bvdSg;
        }
        goto t1ShC;
        fAkdS:
        lTNZE:
        goto wQR5e;
        Naqes:
        $httpInfo = array();
        goto NR94_;
        T7BGc:
        vVdRa:
        goto kkwEG;
        abvjE:
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        goto mENfZ;
        SVayz:
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        goto yqTFi;
        nFVmV:
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22");
        goto o4vyu;
        t1ShC:
        curl_setopt($ch, CURLOPT_URL, $url);
        goto mRbFX;
        kkwEG:
        curl_setopt($ch, CURLOPT_POST, true);
        goto abvjE;
        wQR5e:
        $response = curl_exec($ch);
        goto fUT1p;
        aVXEG:
        rzm7a:
        goto cksI8;
        in6Ua:
        c2z4w:
        goto UaXYa;
        mENfZ:
        curl_setopt($ch, CURLOPT_URL, $url);
        goto fAkdS;
        mRbFX:
        goto rzm7a;
        goto h3uik;
        h3uik:
        bvdSg:
        goto fQd3l;
        MeLRI:
        return false;
        goto in6Ua;
        o4vyu:
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        goto SVayz;
        h7fp7:
    }


  public function doPagePaysuccess()
    {
    	global $_W, $_GPC;
    	function getaccess_token($_W)
    	{
    		$res = pdo_get("ymktv_sun_system", array("uniacid" => $_W["uniacid"]));
    		$appid = $res["appid"];
    		$secret = $res["appsecret"];
    		$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=" . $appid . "&secret=" . $secret . '';
    		$ch = curl_init();
    		curl_setopt($ch, CURLOPT_URL, $url);
    		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    		$data = curl_exec($ch);
    		curl_close($ch);
    		$data = json_decode($data, true);
    		return $data["access_token"];
    	}
    	function set_msg($_W, $_GPC)
    	{
    		$access_token = getaccess_token($_W);
    		$res2 = pdo_get("ymktv_sun_sms", array("uniacid" => $_W["uniacid"]));
    		if ($_GPC["cate"] == 1) {
    			$prepay_id = trim($_GPC["prepay_id"], "prepay_id=");
    		} else {
    			$prepay_id = $_GPC["formId"];
    		}
    		if ($_GPC["local"] == 1) {
    			$sql = " SELECT * FROM " . tablename("ymktv_sun_goods") . " g " . " JOIN " . tablename("ymktv_sun_roomorder") . " r " . " ON " . " r.gid=g.id" . " WHERE " . " r.uniacid=" . $_W["uniacid"] . " AND " . " r.id=" . $_GPC["oid"];
    			$order = pdo_fetch($sql);
    			$data["gname"] = $order["goods_name"] . "  " . date("Y-m-d", $order["timeData"] / 1000) . $order["date_dr"] . $order["timie"] . $order["date_cr"] . $order["times"];
    			$data["order_num"] = $order["order_num"];
    			$data["money"] = $order["price"];
    			$data["paytime"] = date("Y-m-d H:i:s", $order["time"]);
    			$data["num"] = 1;
    		} else {
    			$order = pdo_get("ymktv_sun_order", array("uniacid" => $_W["uniacid"], "id" => $_GPC["oid"]));
    			$data["gname"] = $order["good_name"];
    			$data["order_num"] = $order["order_num"];
    			$data["money"] = $order["money"];
    			$data["paytime"] = $order["pay_time"];
    			$data["num"] = $order["good_num"];
    		}
        // halt($data);
    		// $formwork = "{\n     \"touser\": \"" . $_GET["openid"] . "\",\n     \"template_id\": \"" . $res2["tid1"] . "\",\n     \"page\":\"ymktv_sun/pages/index/index\",\n     \"form_id\":\"" . $prepay_id . "\",\n     \"data\": {\n       \"keyword1\": {\n         \"value\": \"" . $data["order_num"] . "\",\n         \"color\": \"#173177\"\n       },\n       \"keyword2\": {\n         \"value\":\"" . $data["gname"] . "\",\n         \"color\": \"#173177\"\n       },\n       \"keyword3\": {\n         \"value\": \"" . $data["num"] . "\",\n         \"color\": \"#173177\"\n       },\n       \"keyword4\": {\n         \"value\": \"" . $data["money"] . "\",\n         \"color\": \"#173177\"\n       },\n       \"keyword5\": {\n         \"value\":  \"" . $data["paytime"] . "\",\n         \"color\": \"#173177\"\n       }\n     }   \n   }";
    		$formwork = ["touser" => "{$_GET['openid']}", "template_id" => "{$res2['tid1']}", "page" => "ymktv_sun/pages/index/index", "form_id" => "{$prepay_id}", "data" => ["keyword1" => ["value" => $order['address']], "keyword2" => ["value" => $data['money'] . "元"], "keyword3" => ["value" => $data['paytime']], "keyword4" => ["value" => $data['gname']] ]];
    		$formwork = json_encode($formwork);
    		$url = "https://api.weixin.qq.com/cgi-bin/message/wxopen/template/send?access_token=" . $access_token . '';
    		$ch = curl_init();
    		curl_setopt($ch, CURLOPT_URL, $url);
    		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    		curl_setopt($ch, CURLOPT_POST, 1);
    		curl_setopt($ch, CURLOPT_POSTFIELDS, $formwork);
    		$data = curl_exec($ch);
    		curl_close($ch);
    		return $data;
    	}
    	echo set_msg($_W, $_GPC);
    }



    public function doPageRoomorderData()
    {
        goto d_rEt;
        bObNo:
        echo json_encode($data);
        goto ZwxsT;
        xuEWJ:
        ZCLYO:
        goto bObNo;
        OAeN6:
        $sql = " SELECT * FROM " . tablename("ymktv_sun_goods") . " g " . " JOIN " . tablename("ymktv_sun_roomorder") . " r " . " ON " . " g.id=r.gid" . " WHERE " . " r.uniacid=" . $_W["uniacid"] . " AND " . " r.build_id=" . $bid . " AND " . " r.openid=" . "'{$openid}'" . " ORDER BY " . " r.time DESC";
        goto zFqyo;
        zFqyo:
        $data = pdo_fetchall($sql);
        goto ziHMe;
        ziHMe:
        foreach ($data as $k => $v) {
            goto AJPTv;
            AJPTv:
            $data[$k]["type_name"] = pdo_getcolumn("ymktv_sun_type", array("uniacid" => $_W["uniacid"], "id" => $v["type_id"]), "type_name");
            goto L77aN;
            L77aN:
            $data[$k]["b_name"] = pdo_getcolumn("ymktv_sun_building", array("uniacid" => $_W["uniacid"], "id" => $v["build_id"]), "b_name");
            goto Pqsek;
            Pqsek:
            $data[$k]["timeData"] = date("Y-m-d", $v["timeData"] / 1000);
            goto kn5lS;
            Q1NBr:
            gjaBv:
            goto HIB3V;
            kn5lS:
            $data[$k]["timeies"] = $v["date_dr"] . $v["timie"] . "-" . $v["date_cr"] . $v["times"];
            goto Q1NBr;
            HIB3V:
        }
        goto xuEWJ;
        d_rEt:
        global $_W, $_GPC;
        goto eUG1N;
        eUG1N:
        $openid = $_GPC["openid"];
        goto N857V;
        N857V:
        $bid = $_GPC["bid"];
        goto OAeN6;
        ZwxsT:
    }
    public function doPageweiroomorder()
    {
        goto chEW6;
        NANHw:
        foreach ($data as $k => $v) {
            goto Bq9iQ;
            Pqpyz:
            vlx3Y:
            goto VXdvM;
            Bq9iQ:
            $data[$k]["type_name"] = pdo_getcolumn("ymktv_sun_type", array("uniacid" => $_W["uniacid"], "id" => $v["type_id"]), "type_name");
            goto OHFKN;
            hlG1R:
            $data[$k]["timeies"] = $v["date_dr"] . $v["timie"] . "-" . $v["date_cr"] . $v["times"];
            goto Pqpyz;
            cgSIL:
            $data[$k]["timeData"] = date("Y-m-d", $v["timeData"] / 1000);
            goto hlG1R;
            OHFKN:
            $data[$k]["b_name"] = pdo_getcolumn("ymktv_sun_building", array("uniacid" => $_W["uniacid"], "id" => $v["build_id"]), "b_name");
            goto cgSIL;
            VXdvM:
        }
        goto vaaAh;
        JwkdP:
        $data = pdo_fetchall($sql);
        goto NANHw;
        fJcca:
        $sql = " SELECT * FROM " . tablename("ymktv_sun_goods") . " g " . " JOIN " . tablename("ymktv_sun_roomorder") . " r " . " ON " . " g.id=r.gid" . " WHERE " . " r.uniacid=" . $_W["uniacid"] . " AND " . " r.build_id=" . $bid . " AND " . " r.openid=" . "'{$openid}'" . " AND" . " r.status=0" . " ORDER BY " . " r.time DESC";
        goto JwkdP;
        chEW6:
        global $_W, $_GPC;
        goto gaJHK;
        vaaAh:
        HRJZ6:
        goto o_kwJ;
        o_kwJ:
        echo json_encode($data);
        goto S0O0j;
        gaJHK:
        $openid = $_GPC["openid"];
        goto tyu_Y;
        tyu_Y:
        $bid = $_GPC["bid"];
        goto fJcca;
        S0O0j:
    }
    public function doPageyiroomorder()
    {
        goto lgP4T;
        lgP4T:
        global $_GPC, $_W;
        goto Nt7th;
        Glqxx:
        KfOtd:
        goto xNalC;
        LUty7:
        $bid = $_GPC["bid"];
        goto Lvksz;
        bDv83:
        foreach ($data as $k => $v) {
            goto AKk32;
            dSQB7:
            GV037:
            goto wWBYH;
            QX_Lc:
            $data[$k]["b_name"] = pdo_getcolumn("ymktv_sun_building", array("uniacid" => $_W["uniacid"], "id" => $v["build_id"]), "b_name");
            goto JKdrn;
            JKdrn:
            $data[$k]["timeData"] = date("Y-m-d", $v["timeData"] / 1000);
            goto e51O4;
            e51O4:
            $data[$k]["timeies"] = $v["date_dr"] . $v["timie"] . "-" . $v["date_cr"] . $v["times"];
            goto dSQB7;
            AKk32:
            $data[$k]["type_name"] = pdo_getcolumn("ymktv_sun_type", array("uniacid" => $_W["uniacid"], "id" => $v["type_id"]), "type_name");
            goto QX_Lc;
            wWBYH:
        }
        goto Glqxx;
        Nt7th:
        $openid = $_GPC["openid"];
        goto LUty7;
        Lvksz:
        $sql = " SELECT * FROM " . tablename("ymktv_sun_goods") . " g " . " JOIN " . tablename("ymktv_sun_roomorder") . " r " . " ON " . " g.id=r.gid" . " WHERE " . " r.uniacid=" . $_W["uniacid"] . " AND " . " r.build_id=" . $bid . " AND " . " r.openid=" . "'{$openid}'" . " AND" . " r.status=1" . " ORDER BY " . " r.time DESC";
        goto D0z7y;
        D0z7y:
        $data = pdo_fetchall($sql);
        goto bDv83;
        xNalC:
        echo json_encode($data);
        goto oPDBq;
        oPDBq:
    }
    public function doPagedelorder()
    {
        goto q2oHZ;
        LPt90:
        $res = pdo_delete("ymktv_sun_roomorder", array("uniacid" => $_W["uniacid"], "openid" => $openid, "id" => $id));
        goto gOnt2;
        EdTx0:
        $openid = $_GPC["openid"];
        goto Jq18E;
        q2oHZ:
        global $_W, $_GPC;
        goto EdTx0;
        gOnt2:
        echo json_encode($res);
        goto Q3Ial;
        Jq18E:
        $id = $_GPC["id"];
        goto LPt90;
        Q3Ial:
    }
    public function doPageuserData()
    {
        goto OaFiC;
        kfwSR:
        $openid = $_GPC["openid"];
        goto WM5HJ;
        WFxnn:
        echo json_encode($newData);
        goto S4DOA;
        WM5HJ:
        $newData = pdo_get("ymktv_sun_user", array("uniacid" => $_W["uniacid"], "openid" => $openid));
        goto WFxnn;
        OaFiC:
        global $_GPC, $_W;
        goto kfwSR;
        S4DOA:
    }
    public function doPageintegral()
    {
        goto dtbKD;
        GBxFU:
        echo json_encode($data);
        goto ep1Gi;
        KvKAd:
        $data = pdo_getall("ymktv_sun_integral", array("uniacid" => $_W["uniacid"]), '', '', "sort DESC");
        goto GBxFU;
        dtbKD:
        global $_GPC, $_W;
        goto KvKAd;
        ep1Gi:
    }
    public function doPageintegralDetails()
    {
        goto Vl8xH;
        brViR:
        $details["specstock"] = explode(",", $details["specstock"]);
        goto k4oLk;
        yO2i1:
        $details["spec"] = explode(",", $details["spec"]);
        goto brViR;
        k4oLk:
        echo json_encode($details);
        goto Ie2T6;
        xp9UY:
        $details = pdo_get("ymktv_sun_integral", array("uniacid" => $_W["uniacid"], "id" => $id));
        goto aInPk;
        ODfl3:
        $id = $_GPC["id"];
        goto xp9UY;
        Vl8xH:
        global $_GPC, $_W;
        goto ODfl3;
        aInPk:
        $details["imgs"] = explode(",", $details["imgs"]);
        goto yO2i1;
        Ie2T6:
    }
    public function doPageDuigift()
    {
        goto I1Tqq;
        U6mvv:
        $stock = 0;
        goto g5v1V;
        e22TW:
        cMGQn:
        goto U6mvv;
        fygt_:
        $money = $money - $gift;
        goto K0_UH;
        puAXv:
        $res = 0;
        goto ccFk1;
        sr3Al:
        if (!($sms["is_open"] == 1)) {
            goto mVZEN;
        }
        goto K8oTr;
        XBoDY:
        $gift = $_GPC["gift"];
        goto Murog;
        frdXi:
        jYXMl:
        goto ILYgk;
        xNfRA:
        beVmV:
        goto YUTKK;
        K8oTr:
        $this->Shortmessage($sms["mobile"]);
        goto f2WBm;
        mS3_E:
        $address = $_GPC["address"];
        goto OW1WQ;
        WRttU:
        $openid = $_GPC["openid"];
        goto XBoDY;
        ILYgk:
        CPc5J:
        goto dyV6X;
        dyV6X:
        ZZ4J9:
        goto k3018;
        OW1WQ:
        $spec = $_GPC["spec"];
        goto WRttU;
        PBFxw:
        $money = pdo_getcolumn("ymktv_sun_user", array("uniacid" => $_W["uniacid"], "openid" => $openid), "money");
        goto vTN0n;
        YUTKK:
        if ($money > $gift || $money == $gift) {
            goto qlb7M;
        }
        goto puAXv;
        PdnrH:
        pdo_update("ymktv_sun_integral", array("specstock" => $specstock, "stock" => $stock), array("uniacid" => $_W["uniacid"], "id" => $id));
        goto JFpu0;
        vTN0n:
        $data = array("uniacid" => $_W["uniacid"], "pid" => $id, "address" => $address, "createtime" => time(), "status" => 0, "specs" => $spec, "pname" => $integral["integral_name"], "openid" => $openid, "order_num" => date("YmdHis") . rand(1000, 9999));
        goto dAGoF;
        f2WBm:
        mVZEN:
        goto frdXi;
        K0_UH:
        pdo_update("ymktv_sun_user", array("money" => $money), array("uniacid" => $_W["uniacid"], "openid" => $openid));
        goto A6WxZ;
        mEizO:
        if (!$res) {
            goto jYXMl;
        }
        goto TubUI;
        hnai2:
        $specstock = implode(",", $integral["specstock"]);
        goto PdnrH;
        V5aWs:
        qlb7M:
        goto fygt_;
        k3018:
        echo json_encode($res);
        goto quaAf;
        A6WxZ:
        foreach ($integral["specstock"] as $k => $v) {
            goto NYQwy;
            NYQwy:
            if (!($k == $index)) {
                goto erA7r;
            }
            goto fWKiG;
            lGCVQ:
            erA7r:
            goto GVXVw;
            GVXVw:
            JElHy:
            goto bkJBl;
            fWKiG:
            $integral["specstock"][$k] = $v - 1;
            goto lGCVQ;
            bkJBl:
        }
        goto e22TW;
        TubUI:
        $sms = pdo_get("ymktv_sun_sms", array("uniacid" => $_W["uniacid"]));
        goto sr3Al;
        I1Tqq:
        global $_W, $_GPC;
        goto zkWUg;
        ccFk1:
        goto CPc5J;
        goto V5aWs;
        Murog:
        $integral = pdo_get("ymktv_sun_integral", array("uniacid" => $_W["uniacid"], "id" => $id));
        goto ixViW;
        DekSq:
        $res = 2;
        goto kyGWq;
        g5v1V:
        foreach ($integral["specstock"] as $k => $v) {
            $stock += $v;
            kDVoI:
        }
        goto vlHG7;
        zkWUg:
        $id = $_GPC["id"];
        goto H_a77;
        dAGoF:
        if ($integral["specstock"][$index] >= 1) {
            goto beVmV;
        }
        goto DekSq;
        H_a77:
        $index = $_GPC["index"];
        goto mS3_E;
        vlHG7:
        mVt3T:
        goto hnai2;
        JFpu0:
        $res = pdo_insert("ymktv_sun_gift_dh", $data);
        goto mEizO;
        kyGWq:
        goto ZZ4J9;
        goto xNfRA;
        ixViW:
        $integral["specstock"] = explode(",", $integral["specstock"]);
        goto PBFxw;
        quaAf:
    }
    public function doPageGiftorder()
    {
        goto j1WNg;
        yNqvV:
        echo json_encode($data);
        goto HmCJQ;
        QP7G2:
        foreach ($data as $k => $v) {
            $data[$k]["createtime"] = date("Y-m-d H:i:s", $v["createtime"]);
            GbnSW:
        }
        goto gR3L_;
        WAhQK:
        $sql = " SELECT * FROM " . tablename("ymktv_sun_integral") . " i " . " JOIN " . tablename("ymktv_sun_gift_dh") . " g " . " ON " . " g.pid=i.id" . " WHERE " . " g.uniacid=" . $_W["uniacid"] . " AND " . " g.openid=" . "'{$openid}'" . " ORDER BY " . " g.createtime DESC";
        goto ziWyf;
        ziWyf:
        $data = pdo_fetchall($sql);
        goto QP7G2;
        gR3L_:
        wLxYo:
        goto yNqvV;
        dGeSC:
        $openid = $_GPC["openid"];
        goto WAhQK;
        j1WNg:
        global $_W, $_GPC;
        goto dGeSC;
        HmCJQ:
    }
    public function doPageWGiftorder()
    {
        goto rR5Qn;
        qcOz3:
        $openid = $_GPC["openid"];
        goto mKACP;
        rR5Qn:
        global $_W, $_GPC;
        goto qcOz3;
        hiVSN:
        foreach ($data as $k => $v) {
            $data[$k]["createtime"] = date("Y-m-d H:i:s", $v["createtime"]);
            WXaJ9:
        }
        goto ax9PX;
        ax9PX:
        Woxrl:
        goto VBMHm;
        VBMHm:
        echo json_encode($data);
        goto vKL1W;
        mKACP:
        $sql = " SELECT * FROM " . tablename("ymktv_sun_integral") . " i " . " JOIN " . tablename("ymktv_sun_gift_dh") . " g " . " ON " . " g.pid=i.id" . " WHERE " . " g.uniacid=" . $_W["uniacid"] . " AND " . " g.openid=" . "'{$openid}'" . " AND g.status=0" . " ORDER BY " . " g.createtime DESC";
        goto aMdK1;
        aMdK1:
        $data = pdo_fetchall($sql);
        goto hiVSN;
        vKL1W:
    }
    public function doPageYGiftorder()
    {
        goto TSMx1;
        q8Taj:
        $sql = " SELECT * FROM " . tablename("ymktv_sun_integral") . " i " . " JOIN " . tablename("ymktv_sun_gift_dh") . " g " . " ON " . " g.pid=i.id" . " WHERE " . " g.uniacid=" . $_W["uniacid"] . " AND " . " g.openid=" . "'{$openid}'" . " AND g.status=1" . " ORDER BY " . " g.createtime DESC";
        goto uY7mY;
        uMFeq:
        jB37R:
        goto Ihlwe;
        uY7mY:
        $data = pdo_fetchall($sql);
        goto IQKCP;
        TSMx1:
        global $_W, $_GPC;
        goto rwhij;
        rwhij:
        $openid = $_GPC["openid"];
        goto q8Taj;
        Ihlwe:
        echo json_encode($data);
        goto yqbb5;
        IQKCP:
        foreach ($data as $k => $v) {
            $data[$k]["createtime"] = date("Y-m-d H:i:s", $v["createtime"]);
            H8f57:
        }
        goto uMFeq;
        yqbb5:
    }
    public function doPageGdelorder()
    {
        goto lH3Wu;
        G77tC:
        $openid = $_GPC["openid"];
        goto qnIy3;
        qnIy3:
        $res = pdo_delete("ymktv_sun_gift_order", array("uniacid" => $_W["uniacid"], "id" => $id));
        goto uaiZJ;
        g1e0z:
        $id = $_GPC["id"];
        goto G77tC;
        lH3Wu:
        global $_GPC, $_W;
        goto g1e0z;
        uaiZJ:
        echo json_encode($res);
        goto LVvxV;
        LVvxV:
    }
    public function doPagefamily()
    {
        goto YRc0p;
        YRc0p:
        global $_W;
        goto x_MCu;
        x_MCu:
        $data = pdo_get("ymktv_sun_family", array("uniacid" => $_W["uniacid"]));
        goto Q32IQ;
        Q32IQ:
        echo json_encode($data);
        goto Wn6wJ;
        Wn6wJ:
    }
    public function doPagekanallData()
    {
        goto fdsJ_;
        m4V08:
        $data = pdo_getall("ymktv_sun_new_bargain", array("uniacid" => $_W["uniacid"], "status" => 2), '', '', "sort DESC");
        goto rjrpm;
        rjrpm:
        foreach ($data as $k => $v) {
            goto fpDkf;
            UP64y:
            goto Pz79F;
            goto Ot9VA;
            fpDkf:
            if (date("Y-m-d H:i:s", time()) > $v["endtime"]) {
                goto eNimP;
            }
            goto w5HM9;
            w5HM9:
            $data[$k]["btn"] = 0;
            goto UP64y;
            qdWoM:
            m837i:
            goto qUdzW;
            CPjXS:
            $data[$k]["btn"] = 1;
            goto Md4N4;
            Md4N4:
            Pz79F:
            goto EwCUv;
            Ot9VA:
            eNimP:
            goto CPjXS;
            EwCUv:
            $data[$k]["part_num"] = sizeof(pdo_getall("ymktv_sun_user_bargain", array("uniacid" => $_W["uniacid"], "gid" => $v["id"], "mch_id" => 0)));
            goto qdWoM;
            qUdzW:
        }
        goto dwVWx;
        dwVWx:
        OdJnX:
        goto oj_JG;
        oj_JG:
        echo json_encode($data);
        goto exzrb;
        fdsJ_:
        global $_W;
        goto m4V08;
        exzrb:
    }
    public function doPageNowkangood()
    {
        goto rA137;
        D5Xp_:
        $id = $_GPC["id"];
        goto EFLTV;
        szH_O:
        wQuLo:
        goto vXfOl;
        EFLTV:
        $data = pdo_getall("ymktv_sun_new_bargain", array("uniacid" => $_W["uniacid"], "id" => $id));
        goto mKDPw;
        vXfOl:
        echo json_encode($data);
        goto fEuR4;
        rA137:
        global $_W, $_GPC;
        goto D5Xp_;
        mKDPw:
        foreach ($data as $k => $v) {
            goto BT3i1;
            OpSHH:
            $data[$k]["markteprice"] = (float) $v["markteprice"];
            goto Pqxoc;
            Pqxoc:
            $data[$k]["shopprice"] = (float) $v["shopprice"];
            goto fBPme;
            BT3i1:
            $data[$k]["endtime"] = strtotime($v["endtime"]) * 1000;
            goto B4Ly0;
            fBPme:
            N512B:
            goto Uh0Hl;
            B4Ly0:
            $data[$k]["clock"] = '';
            goto Z9BgU;
            Z9BgU:
            $data[$k]["partnum"] = count(pdo_getall("ymktv_sun_user_bargain", array("uniacid" => $_W["uniacid"], "gid" => $id, "mch_id" => 0)));
            goto sjemj;
            mLoT1:
            $data[$k]["antime"] = $v["endtime"];
            goto OpSHH;
            sjemj:
            $data[$k]["lb_imgs"] = explode(",", $v["lb_imgs"]);
            goto mLoT1;
            Uh0Hl:
        }
        goto szH_O;
        fEuR4:
    }
    public function doPagekanstart()
    {
        goto byS2P;
        CGBqg:
        $bargain = pdo_getcolumn("ymktv_sun_system", array("uniacid" => $_W["uniacid"]), "bargain_price");
        goto MxF6u;
        gmuLN:
        $old = pdo_get("ymktv_sun_new_bargain", array("uniacid" => $_W["uniacid"], "id" => $id));
        goto CGBqg;
        eCSPr:
        $id = $_GPC["id"];
        goto gmuLN;
        w82Jc:
        echo json_encode(round(($old["marketprice"] - $old["shopprice"]) * $bargain, 2));
        goto F1VtH;
        MxF6u:
        $bargain = $bargain / 100;
        goto UQP9E;
        BPjqv:
        $res = pdo_insert("ymktv_sun_user_bargain", $data);
        goto w82Jc;
        byS2P:
        global $_GPC, $_W;
        goto B80ZH;
        B80ZH:
        $openid = $_GPC["openid"];
        goto eCSPr;
        UQP9E:
        $data = array("openid" => $openid, "gid" => $id, "mch_id" => 0, "status" => 0, "uniacid" => $_W["uniacid"], "now_price" => $old["marketprice"] - $old["shopprice"] - ($old["marketprice"] - $old["shopprice"]) * $bargain, "kanjia" => ($old["marketprice"] - $old["shopprice"]) * $bargain, "add_time" => time(), "iskan" => 2);
        goto BPjqv;
        F1VtH:
    }
    public function doPageEndActive()
    {
        goto qhl6p;
        n73ZF:
        hCCGj:
        goto QnDG3;
        qU9on:
        goto Aa_8p;
        goto n73ZF;
        QnDG3:
        $res = 0;
        goto lZUst;
        lZUst:
        Aa_8p:
        goto pAKcz;
        qxce9:
        if ($oldData) {
            goto pnAC2;
        }
        goto aNdet;
        VYest:
        if (time() > strtotime($data["endtime"])) {
            goto hCCGj;
        }
        goto qxce9;
        aNdet:
        $res = 1;
        goto N3bHU;
        t3sNr:
        $oldData = pdo_get("ymktv_sun_user_bargain", array("uniacid" => $_W["uniacid"], "gid" => $gid, "openid" => $openid, "mch_id" => 0, "status" => 1));
        goto VYest;
        dc23i:
        $gid = $_GPC["gid"];
        goto kk5F0;
        N3bHU:
        goto dwNRk;
        goto qPck0;
        yydqH:
        $res = 2;
        goto wHHuB;
        qhl6p:
        global $_W, $_GPC;
        goto dc23i;
        pAKcz:
        echo json_encode($res);
        goto ekNsy;
        OJIUP:
        $data = pdo_get("ymktv_sun_new_bargain", array("uniacid" => $_W["uniacid"], "id" => $gid));
        goto t3sNr;
        qPck0:
        pnAC2:
        goto yydqH;
        wHHuB:
        dwNRk:
        goto qU9on;
        kk5F0:
        $openid = $_GPC["openid"];
        goto OJIUP;
        ekNsy:
    }
    public function doPagefindkan()
    {
        goto qrvFA;
        eUcMz:
        if (date("Y-m-d H:i:s", time()) > $goodData["endtime"]) {
            goto iq_dc;
        }
        goto Be3fp;
        qrvFA:
        global $_GPC, $_W;
        goto fWEB0;
        TC6fj:
        $res = 4;
        goto djqln;
        Eiwqv:
        $data = pdo_get("ymktv_sun_user_bargain", array("uniacid" => $_W["uniacid"], "gid" => $id, "openid" => $openid, "mch_id" => 0, "status" => 0));
        goto EvV2h;
        Avai4:
        iq_dc:
        goto St0e8;
        EvV2h:
        if ($data) {
            goto Y9VdT;
        }
        goto cUawD;
        FcWZd:
        $goodData = pdo_get("ymktv_sun_new_bargain", array("uniacid" => $_W["uniacid"], "id" => $id));
        goto eUcMz;
        cUawD:
        $res = 2;
        goto RCRZc;
        AJsG8:
        goto kyGIV;
        goto Avai4;
        djqln:
        oZVW4:
        goto AJsG8;
        qcPiN:
        SclW6:
        goto TC6fj;
        VgRRu:
        goto oZVW4;
        goto qcPiN;
        RCRZc:
        goto yAXlq;
        goto M5u1P;
        vV9hO:
        if ($oldData) {
            goto SclW6;
        }
        goto Eiwqv;
        M5u1P:
        Y9VdT:
        goto bEWfu;
        JVrfE:
        $id = $_GPC["id"];
        goto FcWZd;
        St0e8:
        $res = 0;
        goto n82s5;
        fWEB0:
        $openid = $_GPC["openid"];
        goto JVrfE;
        bEWfu:
        $res = 1;
        goto MH7ZE;
        MH7ZE:
        yAXlq:
        goto VgRRu;
        n82s5:
        kyGIV:
        goto QpqDV;
        Be3fp:
        $oldData = pdo_get("ymktv_sun_user_bargain", array("uniacid" => $_W["uniacid"], "gid" => $id, "openid" => $openid, "mch_id" => 0, "status" => 1));
        goto vV9hO;
        QpqDV:
        echo json_encode($res);
        goto d37X1;
        d37X1:
    }
    public function doPagekanmaster()
    {
        goto UB99w;
        mI2h3:
        $userid = $_GPC["userid"];
        goto Rn13Y;
        rOvbf:
        echo json_encode($data);
        goto E8GM0;
        Rn13Y:
        $id = $_GPC["id"];
        goto r7ks6;
        OE20b:
        $data = pdo_fetch($sql);
        goto rOvbf;
        r7ks6:
        $sql = " SELECT * FROM " . tablename("ymktv_sun_user") . " u " . " JOIN " . tablename("ymktv_sun_user_bargain") . " ub " . " ON " . " ub.openid=u.openid" . " WHERE " . " ub.gid=" . $id . " AND " . " ub.mch_id=0" . " AND " . " ub.openid=" . "'{$userid}'" . " AND " . " ub.uniacid=" . $_W["uniacid"] . " AND " . " u.uniacid=" . $_W["uniacid"];
        goto OE20b;
        UB99w:
        global $_W, $_GPC;
        goto mI2h3;
        E8GM0:
    }
    public function doPagefriendkan()
    {
        goto xVtPr;
        unOVj:
        h7ygz:
        goto JkZk_;
        QPdWv:
        goto zUNOq;
        goto z19zC;
        SmDTa:
        $ids[] = $mch_id;
        goto mw5Z4;
        xVtPr:
        global $_GPC, $_W;
        goto vV9_b;
        M_hzr:
        WEofj:
        goto iHrjN;
        mw5Z4:
        $oldData = pdo_getall("ymktv_sun_user_bargain", array("id not in " => $ids, "uniacid" => $_W["uniacid"]));
        goto RfDaT;
        r9rC0:
        $mch_id = pdo_getcolumn("ymktv_sun_user_bargain", array("uniacid" => $_W["uniacid"], "openid" => $userid, "gid" => $gid, "mch_id" => 0), "id");
        goto ieowJ;
        qHG95:
        $bargain = pdo_getcolumn("ymktv_sun_system", array("uniacid" => $_W["uniacid"]), "bargain_price");
        goto tWJZd;
        fTGml:
        ivZY_:
        goto vyv7D;
        ieowJ:
        $ids = $this->getSon(pdo_getall("ymktv_sun_user_bargain", array("uniacid" => $_W["uniacid"])), $mch_id);
        goto SmDTa;
        Vi_SP:
        if ($nowprice - $nowprice * $bargain / 100 >= 0) {
            goto KVIld;
        }
        goto UcSiP;
        EwR46:
        foreach ($oldData as $k => $v) {
            $price += $v["kanjia"];
            bwpi9:
        }
        goto fTGml;
        hkn43:
        $req_timestamp = $_GPC["timestamp"];
        goto Ei025;
        jHbxx:
        $openid = $_GPC["openid"];
        goto hkn43;
        IVADl:
        if (!($current_timestamp - 5 > $req_timestamp / 1000)) {
            goto WEofj;
        }
        goto ZnYm9;
        tWJZd:
        if ($nowprice >= 0) {
            goto bUGef;
        }
        goto YgnRV;
        UcSiP:
        $data["kanjia"] = $nowprice - $goodData["shopprice"];
        goto QPdWv;
        h9sX2:
        zUNOq:
        goto ojMyD;
        YgnRV:
        echo json_encode(0);
        goto ev4rX;
        TRhWm:
        $t = $_GPC["t"];
        goto YSTBx;
        okkhv:
        bUGef:
        goto qWH67;
        vV9_b:
        $userid = $_GPC["userid"];
        goto Nqowc;
        ojMyD:
        $res = pdo_insert("ymktv_sun_user_bargain", $data);
        goto TjBHQ;
        z19zC:
        KVIld:
        goto h6ZLD;
        Nqowc:
        $gid = $_GPC["gid"];
        goto jHbxx;
        Ei025:
        $current_timestamp = time();
        goto TRhWm;
        ev4rX:
        goto gDvmL;
        goto okkhv;
        JkZk_:
        $goodData = pdo_get("ymktv_sun_new_bargain", array("uniacid" => $_W["uniacid"], "id" => $gid));
        goto r9rC0;
        qWH67:
        $data = array("openid" => $openid, "gid" => $gid, "mch_id" => $mch_id, "status" => 0, "uniacid" => $_W["uniacid"], "add_time" => time(), "now_price" => $nowprice - $nowprice * $bargain / 100, "iskan" => 1);
        goto Vi_SP;
        YSTBx:
        $key = "alsjdlqkwjlke123654!@#!@81903890";
        goto ARK0g;
        TLs3G:
        gDvmL:
        goto uy1Ue;
        TjBHQ:
        echo json_encode(round($nowprice * $bargain / 100, 2));
        goto TLs3G;
        h6ZLD:
        $data["kanjia"] = $nowprice * $bargain / 100;
        goto h9sX2;
        ZnYm9:
        return $this->result(1, "请勿重复请求！", null);
        goto M_hzr;
        RfDaT:
        $price = 0;
        goto EwR46;
        iHrjN:
        if (!($my_t !== $t)) {
            goto h7ygz;
        }
        goto fYEpG;
        fYEpG:
        return $this->result(1, "非法请求！", null);
        goto unOVj;
        ARK0g:
        $my_t = base64_encode($req_timestamp . "???" . $key);
        goto IVADl;
        vyv7D:
        $nowprice = $goodData["marketprice"] - $goodData["shopprice"] - $price;
        goto qHG95;
        uy1Ue:
    }
    public function doPageiskan()
    {
        goto FOtya;
        jS7dH:
        goto Q9yTA;
        goto wlodx;
        UHbg_:
        $data = pdo_get("ymktv_sun_user_bargain", array("uniacid" => $_W["uniacid"], "gid" => $gid, "openid" => $userid, "mch_id" => 0));
        goto hdCe2;
        wlodx:
        Ysdtv:
        goto UHbg_;
        FOtya:
        global $_GPC, $_W;
        goto IpoUG;
        hc5pf:
        if ($openid == $userid) {
            goto Ysdtv;
        }
        goto kvLV8;
        IpoUG:
        $gid = $_GPC["gid"];
        goto ETaqR;
        RsExZ:
        $userid = $_GPC["userid"];
        goto neB1Q;
        ETaqR:
        $openid = $_GPC["openid"];
        goto RsExZ;
        kvLV8:
        $data = pdo_get("ymktv_sun_user_bargain", array("uniacid" => $_W["uniacid"], "gid" => $gid, "openid" => $openid, "mch_id" => $mch_id));
        goto jS7dH;
        hdCe2:
        Q9yTA:
        goto H__AY;
        H__AY:
        echo json_encode($data);
        goto p8aQ7;
        neB1Q:
        $mch_id = pdo_getcolumn("ymktv_sun_user_bargain", array("uniacid" => $_W["uniacid"], "openid" => $userid, "gid" => $gid, "mch_id" => 0), "id");
        goto hc5pf;
        p8aQ7:
    }
    public function doPageisfriend()
    {
        goto xAbGn;
        ZXYzF:
        $res = pdo_get("ymktv_sun_user_bargain", array("uniacid" => $_W["uniacid"], "openid" => $openid, "mch_id" => $mch_id, "gid" => $gid));
        goto x8FUU;
        vs99x:
        $mch_id = pdo_getcolumn("ymktv_sun_user_bargain", array("uniacid" => $_W["uniacid"], "openid" => $userid, "gid" => $gid, "mch_id" => 0), "id");
        goto ZXYzF;
        HktB5:
        $userid = $_GPC["userid"];
        goto uKYp5;
        x8FUU:
        echo json_encode($res);
        goto FZuOj;
        uKYp5:
        $gid = $_GPC["gid"];
        goto GlH9k;
        xAbGn:
        global $_GPC, $_W;
        goto HktB5;
        GlH9k:
        $openid = $_GPC["openid"];
        goto vs99x;
        FZuOj:
    }
    public function getSon($data, $id)
    {
        goto dMcvD;
        nKDP6:
        foreach ($data as $k => $v) {
            goto e0z8a;
            CoRh_:
            qqb5O:
            goto TGeNC;
            eUU4u:
            $temp[] = $v["id"];
            goto qI3QP;
            e0z8a:
            if (!($v["mch_id"] == $id)) {
                goto X1TMU;
            }
            goto eUU4u;
            qI3QP:
            X1TMU:
            goto CoRh_;
            TGeNC:
        }
        goto abt3J;
        abt3J:
        JjB9p:
        goto U2hYr;
        U2hYr:
        return $temp;
        goto JDZwj;
        dMcvD:
        $temp = array();
        goto nKDP6;
        JDZwj:
    }
    public function doPageindexbargain()
    {
        goto C1r15;
        CqC8A:
        $time = date("Y-m-d H:i:s", time());
        goto rcsOc;
        KDebd:
        rIq9W:
        goto sEkIr;
        C1r15:
        global $_W, $_GPC;
        goto WLQIW;
        rcsOc:
        $bargain = pdo_getall("ymktv_sun_new_bargain", array("uniacid" => $_W["uniacid"], "status" => 2, "showindex" => 1));
        goto p_wR2;
        WlGQR:
        G21kY:
        goto qkbpr;
        O58jS:
        foreach ($bargain as $k => $v) {
            goto KM2AB;
            GsJVN:
            $data[] = $v;
            goto Cy3aT;
            S9_ev:
            if (!($time <= $v["endtime"])) {
                goto Udmn9;
            }
            goto GsJVN;
            Cy3aT:
            Udmn9:
            goto ywWHz;
            ywWHz:
            Z0Mrx:
            goto tc6Xq;
            tc6Xq:
            ejWNb:
            goto QM4ma;
            KM2AB:
            if (!in_array($bid, explode(",", $v["build_id"]))) {
                goto Z0Mrx;
            }
            goto S9_ev;
            QM4ma:
        }
        goto WlGQR;
        btQRm:
        $data[0] = 0;
        goto cFWMW;
        ZY2T5:
        echo json_encode($data);
        goto B76go;
        qkbpr:
        if ($data) {
            goto CHaXU;
        }
        goto btQRm;
        mw6B9:
        $userbargain = pdo_getall("ymktv_sun_user_bargain", array("uniacid" => $_W["uniacid"], "gid" => $data[0]["id"], "mch_id" => 0));
        goto dRVbc;
        lHyfP:
        CHaXU:
        goto mw6B9;
        sEkIr:
        YiXpa:
        goto ZY2T5;
        WLQIW:
        $bid = $_GPC["bid"];
        goto CqC8A;
        dRVbc:
        foreach ($data as $k => $v) {
            goto Z0ukZ;
            hM_eW:
            $data[$k]["lb_imgs"] = explode(",", $v["lb_imgs"]);
            goto N8dcs;
            NMl0l:
            $data[$k]["lb_imgs"] = explode(",", $v["lb_imgs"]);
            goto vRtza;
            N8dcs:
            qxujO:
            goto XM3Ou;
            Z0ukZ:
            $data[$k]["endtime"] = strtotime($v["endtime"]) * 1000;
            goto l2YA4;
            vRtza:
            $data[$k]["part_num"] = sizeof($userbargain);
            goto hM_eW;
            l2YA4:
            $data[$k]["clock"] = '';
            goto NMl0l;
            XM3Ou:
        }
        goto KDebd;
        p_wR2:
        $data = array();
        goto O58jS;
        cFWMW:
        goto YiXpa;
        goto lHyfP;
        B76go:
    }
    public function doPagefriendData()
    {
        goto yF2Dh;
        AMIoF:
        $userid = $_GPC["userid"];
        goto BNbN1;
        BNbN1:
        $gid = $_GPC["gid"];
        goto jcRxB;
        G6l5h:
        $sql = " SELECT * FROM " . tablename("ymktv_sun_user") . " u " . " JOIN " . tablename("ymktv_sun_user_bargain") . " ub " . " ON " . " ub.openid=u.openid" . " WHERE " . " ub.gid =" . $gid . " AND " . " ub.mch_id=" . $mch_id . " AND " . " ub.uniacid=" . $_W["uniacid"] . " AND " . " u.uniacid=" . $_W["uniacid"];
        goto xvr1b;
        yF2Dh:
        global $_GPC, $_W;
        goto AMIoF;
        xvr1b:
        $data = pdo_fetchall($sql);
        goto Cdk3I;
        jcRxB:
        $mch_id = pdo_getcolumn("ymktv_sun_user_bargain", array("uniacid" => $_W["uniacid"], "openid" => $userid, "gid" => $gid, "mch_id" => 0), "id");
        goto G6l5h;
        Cdk3I:
        echo json_encode($data);
        goto V_iih;
        V_iih:
    }
    public function doPagekanmasterData()
    {
        goto V1Grq;
        QlBHn:
        foreach ($data as $k => $v) {
            goto FMqF1;
            FMqF1:
            $price += $v["kanjia"];
            goto PjF39;
            PjF39:
            $img[] = $v["img"];
            goto liZtQ;
            liZtQ:
            ekgBs:
            goto ocyiI;
            ocyiI:
        }
        goto iLXCC;
        rkH_3:
        $price = 0;
        goto x60Q_;
        LzR9F:
        $mch_id = pdo_get("ymktv_sun_user_bargain", array("uniacid" => $_W["uniacid"], "openid" => $openid, "gid" => $gid, "mch_id" => 0));
        goto IrohW;
        M7MaQ:
        echo json_encode($newData);
        goto YMJdB;
        paN2X:
        $gid = $_GPC["gid"];
        goto f7CJi;
        K3xRg:
        $newData = array("now_price" => (float) $goodData["marketprice"] - (float) $price - (float) $mch_id["kanjia"], "img" => $img, "kanjia" => (float) $price + (float) $mch_id["kanjia"]);
        goto M7MaQ;
        wYpZH:
        $img[] = $user["img"];
        goto K3xRg;
        IrohW:
        $sql = " SELECT * FROM " . tablename("ymktv_sun_user") . " u " . " JOIN " . tablename("ymktv_sun_user_bargain") . " ub " . " ON " . " ub.openid=u.openid" . " WHERE " . " ub.gid =" . $gid . " AND " . " ub.mch_id=" . $mch_id["id"] . " AND " . " ub.uniacid=" . $_W["uniacid"];
        goto jlHKL;
        iLXCC:
        ttRKC:
        goto wYpZH;
        TTPGT:
        $goodData = pdo_get("ymktv_sun_new_bargain", array("uniacid" => $_W["uniacid"], "id" => $gid));
        goto LzR9F;
        x60Q_:
        $img = array();
        goto QlBHn;
        f7CJi:
        $user = pdo_get("ymktv_sun_user", array("uniacid" => $_W["uniacid"], "openid" => $openid));
        goto TTPGT;
        K3a_u:
        $openid = $_GPC["openid"];
        goto paN2X;
        jlHKL:
        $data = pdo_fetchall($sql);
        goto rkH_3;
        V1Grq:
        global $_W, $_GPC;
        goto K3a_u;
        YMJdB:
    }
    public function doPagekangoodid()
    {
        goto boO6D;
        wrmsr:
        $price = $_GPC["price"];
        goto k2xSC;
        k2xSC:
        $data = pdo_get("ymktv_sun_new_bargain", array("uniacid" => $_W["uniacid"], "id" => $id));
        goto nRr7o;
        boO6D:
        global $_W, $_GPC;
        goto YG2ey;
        YG2ey:
        $id = $_GPC["id"];
        goto wrmsr;
        nRr7o:
        $integral = pdo_getcolumn("ymktv_sun_system", array("uniacid" => $_W["uniacid"]), "integral");
        goto T8Pld;
        Vrd4o:
        echo json_encode($data);
        goto q20Hn;
        T8Pld:
        $data["integral"] = $integral * $price;
        goto Vrd4o;
        q20Hn:
    }
    public function doPagekanjiaorder()
    {
        goto NIHks;
        BA0l_:
        $distribution->computecommission();
        goto NHwiO;
        mZvdU:
        $distribution->ordertype = 3;
        goto BA0l_;
        Y52qW:
        $distribution->userid = $_GPC["openid"];
        goto mZvdU;
        TxL6T:
        WlwBv:
        goto UcY30;
        j2W8x:
        $kjgood["sid"] = explode(",", $kjgood["sid"]);
        goto bEdYu;
        SUdUB:
        $kjgood = pdo_get("ymktv_sun_new_bargain", array("uniacid" => $_W["uniacid"], "id" => $id));
        goto CivKk;
        bEdYu:
        foreach ($kjgood["build_id"] as $k => $v) {
            goto Tb29h;
            Tb29h:
            foreach ($kjgood["sid"] as $kk => $vv) {
                goto M2G3e;
                i38cq:
                $sid = $vv;
                goto yq12W;
                qWMv9:
                OEGee:
                goto L4Qme;
                yq12W:
                gc6j3:
                goto qWMv9;
                M2G3e:
                if (!($bid == $v)) {
                    goto gc6j3;
                }
                goto i38cq;
                L4Qme:
            }
            goto ccWdn;
            APHAh:
            WhueM:
            goto NrGek;
            ccWdn:
            ITbQA:
            goto APHAh;
            NrGek:
        }
        goto GOCoG;
        mRV7H:
        $distribution = new Distribution();
        goto VGmhn;
        jFOBb:
        pdo_update("ymktv_sun_user_bargain", array("status" => 1), array("uniacid" => $_W["uniacid"], "openid" => $openid, "gid" => $id, "mch_id" => 0));
        goto Ds3aa;
        KvtJo:
        $distribution->money = $_GPC["price"];
        goto Y52qW;
        NHwiO:
        goto TxL6T;
        GOCoG:
        MHGFG:
        goto Wyxlc;
        JqOUi:
        $price = $_GPC["price"];
        goto TcAL7;
        TcAL7:
        $remark = $_GPC["remark"];
        goto Vb04Q;
        VGmhn:
        $distribution->order_id = $post_id;
        goto KvtJo;
        CivKk:
        $kjgood["build_id"] = explode(",", $kjgood["build_id"]);
        goto j2W8x;
        EDKT_:
        $money = pdo_getcolumn("ymktv_sun_user", array("uniacid" => $_W["uniacid"], "openid" => $openid), "money");
        goto ypVKr;
        QaIzS:
        if (!$res) {
            goto WlwBv;
        }
        goto EDKT_;
        jmswa:
        $id = $_GPC["id"];
        goto An5gP;
        Vb04Q:
        $mobile = $_GPC["mobile"];
        goto jT4XZ;
        bQfsN:
        $post_id = pdo_insertid();
        goto QaIzS;
        ypVKr:
        $money = $money + $integral;
        goto kkIpV;
        Wyxlc:
        $data = array("openid" => $openid, "gid" => $id, "price" => $price, "timeData" => date("Y-m-d H:i:s", time()), "mobile" => $mobile, "remark" => $remark, "uniacid" => $_W["uniacid"], "time" => time(), "order_num" => date("YmdHis") . rand(1000, 9999), "state" => 0, "sid" => $sid, "build_id" => $bid);
        goto DZjMc;
        NIHks:
        global $_GPC, $_W;
        goto jmswa;
        jT4XZ:
        $integral = $_GPC["integral"];
        goto SUdUB;
        An5gP:
        $bid = $_GPC["bid"];
        goto a1J3J;
        kkIpV:
        pdo_update("ymktv_sun_user", array("money" => $money), array("uniacid" => $_W["uniacid"], "openid" => $openid));
        goto jFOBb;
        DZjMc:
        $res = pdo_insert("ymktv_sun_kjorder", $data);
        goto bQfsN;
        UcY30:
        echo json_encode($res);
        goto Xi3Sf;
        a1J3J:
        $openid = $_GPC["openid"];
        goto JqOUi;
        Ds3aa:
        include_once IA_ROOT . "/addons/ymktv_sun/inc/func/distribution.php";
        goto mRV7H;
        Xi3Sf:
    }
    public function doPageuserkanjilu()
    {
        goto Ldbpe;
        Ldbpe:
        global $_GPC, $_W;
        goto lBn8M;
        s__9W:
        $sql = " SELECT * FROM " . tablename("ymktv_sun_new_bargain") . " nb " . " JOIN " . tablename("ymktv_sun_user_bargain") . " ub" . " ON " . " ub.gid=nb.id" . " WHERE " . " ub.uniacid= " . $_W["uniacid"] . " AND " . " ub.openid=" . "'{$openid}'" . " AND" . " mch_id=0" . " ORDER BY " . " add_time DESC ";
        goto YYvDr;
        lBn8M:
        $openid = $_GPC["openid"];
        goto yfvnT;
        i51gy:
        foreach ($bargain as $k => $v) {
            goto sx25c;
            sx25c:
            if (!in_array($bid, explode(",", $v["build_id"]))) {
                goto uE2z3;
            }
            goto Z0zNo;
            vsjdV:
            Vom1z:
            goto VcCRz;
            Z0zNo:
            $data[] = $v;
            goto a5ZRv;
            a5ZRv:
            uE2z3:
            goto vsjdV;
            VcCRz:
        }
        goto uZlGX;
        yfvnT:
        $bid = $_GPC["bid"];
        goto s__9W;
        zTQXO:
        $data = array();
        goto i51gy;
        uZlGX:
        WGhKq:
        goto O9TYS;
        O9TYS:
        echo json_encode($data);
        goto xEJrA;
        YYvDr:
        $bargain = pdo_fetchall($sql);
        goto zTQXO;
        xEJrA:
    }
    public function doPageWuserkanjilu()
    {
        goto RDJY5;
        i3i4W:
        foreach ($bargain as $k => $v) {
            goto BMrwq;
            sK3Xn:
            gN6cd:
            goto RwqMm;
            BMrwq:
            if (!in_array($bid, explode(",", $v["build_id"]))) {
                goto n5KXk;
            }
            goto ryU1d;
            ryU1d:
            $data[] = $v;
            goto RJz7x;
            RJz7x:
            n5KXk:
            goto sK3Xn;
            RwqMm:
        }
        goto jRfb7;
        jRfb7:
        V2K3S:
        goto uPUSV;
        NHEBC:
        $data = array();
        goto i3i4W;
        gFriX:
        $openid = $_GPC["openid"];
        goto Pr_3B;
        uk_jW:
        $bargain = pdo_fetchall($sql);
        goto NHEBC;
        uPUSV:
        echo json_encode($data);
        goto pPOcC;
        fo6IW:
        $sql = " SELECT * FROM " . tablename("ymktv_sun_new_bargain") . " nb " . " JOIN " . tablename("ymktv_sun_user_bargain") . " ub" . " ON " . " ub.gid=nb.id" . " WHERE " . " ub.uniacid= " . $_W["uniacid"] . " AND " . " ub.openid=" . "'{$openid}'" . " AND" . " mch_id=0" . " AND" . " ub.status=0" . " ORDER BY " . " add_time DESC ";
        goto uk_jW;
        Pr_3B:
        $bid = $_GPC["bid"];
        goto fo6IW;
        RDJY5:
        global $_GPC, $_W;
        goto gFriX;
        pPOcC:
    }
    public function doPageYuserkanjilu()
    {
        goto Buh9x;
        jBKiT:
        $openid = $_GPC["openid"];
        goto Zikz6;
        xpteR:
        foreach ($bargain as $k => $v) {
            goto JE4BR;
            ZCj3W:
            $data[] = $v;
            goto Tmq4m;
            J19QC:
            dexKI:
            goto YTr6K;
            Tmq4m:
            PF8k3:
            goto J19QC;
            JE4BR:
            if (!in_array($bid, explode(",", $v["build_id"]))) {
                goto PF8k3;
            }
            goto ZCj3W;
            YTr6K:
        }
        goto f2fdg;
        DKL9A:
        echo json_encode($data);
        goto mySUa;
        BCGn3:
        $sql = " SELECT * FROM " . tablename("ymktv_sun_new_bargain") . " nb " . " JOIN " . tablename("ymktv_sun_user_bargain") . " ub" . " ON " . " ub.gid=nb.id" . " WHERE " . " ub.uniacid= " . $_W["uniacid"] . " AND " . " ub.openid=" . "'{$openid}'" . " AND" . " mch_id=0" . " AND" . " ub.status=1" . " ORDER BY " . " add_time DESC ";
        goto qT73B;
        Buh9x:
        global $_GPC, $_W;
        goto jBKiT;
        qT73B:
        $bargain = pdo_fetchall($sql);
        goto v0oHX;
        Zikz6:
        $bid = $_GPC["bid"];
        goto BCGn3;
        f2fdg:
        kaHfM:
        goto DKL9A;
        v0oHX:
        $data = array();
        goto xpteR;
        mySUa:
    }
    public function doPageuserjikajilu()
    {
        goto DCCSL;
        kIK6U:
        echo json_encode($newData);
        goto zbVeh;
        nzwdT:
        $openid = $_GPC["openid"];
        goto ETFTF;
        DCCSL:
        global $_GPC, $_W;
        goto nzwdT;
        TVQNP:
        foreach ($data as $k => $v) {
            $newData[$v["active_id"]][] = $v;
            mHhsj:
        }
        goto BJlgr;
        ETFTF:
        $bid = $_GPC["bid"];
        goto n8L3y;
        n8L3y:
        $sql = " SELECT * FROM " . tablename("ymktv_sun_active") . " a " . " JOIN " . tablename("ymktv_sun_user_active") . " ua" . " ON " . " a.id=ua.active_id" . " WHERE " . " ua.uniacid= " . $_W["uniacid"] . " AND " . " ua.uid=" . "'{$openid}'" . " AND " . " ua.build_id=" . $bid;
        goto M5twS;
        BJlgr:
        tO46S:
        goto fQqlo;
        e3tKm:
        wfpz9:
        goto kIK6U;
        b7PHH:
        $newData = array();
        goto TVQNP;
        fQqlo:
        foreach ($newData as $k => $v) {
            goto fTTq0;
            sTp6m:
            $newData[$k]["nownum"] = sizeof(pdo_getall("ymktv_sun_user_active", array("uniacid" => $_W["uniacid"], "active_id" => $k, "uid" => $openid)));
            goto TFizc;
            fTTq0:
            $newData[$k]["num"] = sizeof(pdo_getall("ymktv_sun_gift", array("uniacid" => $_W["uniacid"], "pid" => $k)));
            goto sTp6m;
            TFizc:
            l0ZbA:
            goto KD7Ls;
            KD7Ls:
        }
        goto e3tKm;
        M5twS:
        $data = pdo_fetchall($sql);
        goto b7PHH;
        zbVeh:
    }
    public function doPageWuserjikajilu()
    {
        goto fkYDD;
        UdVko:
        $data = pdo_fetchall($sql);
        goto Nelp1;
        fkYDD:
        global $_GPC, $_W;
        goto svoYp;
        QLgZg:
        $bid = $_GPC["bid"];
        goto RvY_4;
        svoYp:
        $openid = $_GPC["openid"];
        goto QLgZg;
        iO4Xf:
        pFTFO:
        goto TOeUq;
        Nelp1:
        $newData = array();
        goto mBvBw;
        ZE64Y:
        echo json_encode($newData);
        goto pSR0x;
        EXJ42:
        a9pEs:
        goto ZE64Y;
        TOeUq:
        foreach ($newData as $k => $v) {
            goto Bi1uE;
            rW2yR:
            gAWUG:
            goto SAVWJ;
            Bi1uE:
            $newData[$k]["num"] = sizeof(pdo_getall("ymktv_sun_gift", array("uniacid" => $_W["uniacid"], "pid" => $k)));
            goto JLXFf;
            JLXFf:
            $newData[$k]["nownum"] = sizeof(pdo_getall("ymktv_sun_user_active", array("uniacid" => $_W["uniacid"], "active_id" => $k, "uid" => $openid)));
            goto rW2yR;
            SAVWJ:
        }
        goto EXJ42;
        RvY_4:
        $sql = " SELECT * FROM " . tablename("ymktv_sun_active") . " a " . " JOIN " . tablename("ymktv_sun_user_active") . " ua" . " ON " . " a.id=ua.active_id" . " WHERE " . " ua.uniacid= " . $_W["uniacid"] . " AND " . " ua.uid=" . "'{$openid}'" . " AND " . " ua.isprize=0" . " AND " . " ua.build_id=" . $bid;
        goto UdVko;
        mBvBw:
        foreach ($data as $k => $v) {
            $newData[$v["active_id"]][] = $v;
            N215v:
        }
        goto iO4Xf;
        pSR0x:
    }
    public function doPageYuserjikajilu()
    {
        goto lKYY3;
        AF10g:
        foreach ($data as $k => $v) {
            $newData[$v["active_id"]][] = $v;
            c3C0o:
        }
        goto BIei6;
        exxLd:
        $sql = " SELECT * FROM " . tablename("ymktv_sun_active") . " a " . " JOIN " . tablename("ymktv_sun_user_active") . " ua" . " ON " . " a.id=ua.active_id" . " WHERE " . " ua.uniacid= " . $_W["uniacid"] . " AND " . " ua.uid=" . "'{$openid}'" . " AND " . " ua.isprize=1" . " AND " . " ua.build_id=" . $bid;
        goto zaIjM;
        U7oFG:
        echo json_encode($newData);
        goto v5Iuo;
        BIei6:
        BXqvA:
        goto kgjvw;
        FTb_T:
        X5Myg:
        goto U7oFG;
        cFvG5:
        $bid = $_GPC["bid"];
        goto exxLd;
        okFo0:
        $openid = $_GPC["openid"];
        goto cFvG5;
        nbEz1:
        $newData = array();
        goto AF10g;
        zaIjM:
        $data = pdo_fetchall($sql);
        goto nbEz1;
        kgjvw:
        foreach ($newData as $k => $v) {
            goto Vbcqv;
            b9anP:
            $newData[$k]["nownum"] = sizeof(pdo_getall("ymktv_sun_user_active", array("uniacid" => $_W["uniacid"], "active_id" => $k, "uid" => $openid)));
            goto dXuBb;
            Vbcqv:
            $newData[$k]["num"] = sizeof(pdo_getall("ymktv_sun_gift", array("uniacid" => $_W["uniacid"], "pid" => $k)));
            goto b9anP;
            dXuBb:
            x4Qkj:
            goto IjeLs;
            IjeLs:
        }
        goto FTb_T;
        lKYY3:
        global $_GPC, $_W;
        goto okFo0;
        v5Iuo:
    }
    public function doPageuserkanorder()
    {
        goto uK1hw;
        gGrrZ:
        $bid = $_GPC["bid"];
        goto Veh3x;
        V3EYZ:
        $data = pdo_fetchall($sql);
        goto yPSSb;
        Veh3x:
        $sql = " SELECT * FROM " . tablename("ymktv_sun_new_bargain") . " nb " . " JOIN " . tablename("ymktv_sun_kjorder") . " ko" . " ON " . " ko.gid=nb.id" . " WHERE " . " ko.uniacid= " . $_W["uniacid"] . " AND " . " ko.build_id=" . $bid . " AND " . " ko.openid=" . "'{$openid}'" . " ORDER BY " . " time DESC ";
        goto V3EYZ;
        uK1hw:
        global $_GPC, $_W;
        goto Vz7HC;
        yPSSb:
        echo json_encode($data);
        goto qFIK0;
        Vz7HC:
        $openid = $_GPC["openid"];
        goto gGrrZ;
        qFIK0:
    }
    public function doPageWuserkanorder()
    {
        goto IijOR;
        UfzZE:
        $sql = " SELECT * FROM " . tablename("ymktv_sun_new_bargain") . " nb " . " JOIN " . tablename("ymktv_sun_kjorder") . " ko" . " ON " . " ko.gid=nb.id" . " WHERE " . " ko.uniacid= " . $_W["uniacid"] . " AND " . " ko.build_id=" . $bid . " AND " . " ko.openid=" . "'{$openid}'" . " AND " . " ko.state=0" . " ORDER BY " . " time DESC ";
        goto R4isZ;
        wwyv0:
        $bid = $_GPC["bid"];
        goto UfzZE;
        xvPod:
        $openid = $_GPC["openid"];
        goto wwyv0;
        WD6l6:
        echo json_encode($data);
        goto hMnbM;
        R4isZ:
        $data = pdo_fetchall($sql);
        goto WD6l6;
        IijOR:
        global $_GPC, $_W;
        goto xvPod;
        hMnbM:
    }
    public function doPageYuserkanorder()
    {
        goto I36l7;
        a6AnP:
        $sql = " SELECT * FROM " . tablename("ymktv_sun_new_bargain") . " nb " . " JOIN " . tablename("ymktv_sun_kjorder") . " ko" . " ON " . " ko.gid=nb.id" . " WHERE " . " ko.uniacid= " . $_W["uniacid"] . " AND " . " ko.build_id=" . $bid . " AND " . " ko.openid=" . "'{$openid}'" . " AND " . " ko.state=1" . " ORDER BY " . " time DESC ";
        goto JMG0Q;
        I36l7:
        global $_GPC, $_W;
        goto WMAxB;
        XxhPO:
        echo json_encode($data);
        goto DFLDG;
        odWQ_:
        $bid = $_GPC["bid"];
        goto a6AnP;
        WMAxB:
        $openid = $_GPC["openid"];
        goto odWQ_;
        JMG0Q:
        $data = pdo_fetchall($sql);
        goto XxhPO;
        DFLDG:
    }
    public function doPageUserfinded()
    {
        goto dFVwr;
        T7fD9:
        echo json_encode($res);
        goto TG99e;
        QrF6S:
        C0Yoe:
        goto T7fD9;
        JcvSY:
        goto QrF6S;
        Zw5c6:
        $res = pdo_update("ymktv_sun_kjorder", array("state" => 1), array("uniacid" => $_W["uniacid"], "id" => $id, "openid" => $openid));
        goto v7KIh;
        zs4rJ:
        $id = $_GPC["id"];
        goto E3014;
        uq8rb:
        $distribution->ordertype = 3;
        goto A1DYm;
        dFVwr:
        global $_W, $_GPC;
        goto zs4rJ;
        wi4W2:
        $distribution->order_id = $_GPC["id"];
        goto uq8rb;
        E3014:
        $openid = $_GPC["openid"];
        goto Zw5c6;
        FiJ15:
        include_once IA_ROOT . "/addons/ymktv_sun/inc/func/distribution.php";
        goto XuoIQ;
        A1DYm:
        $distribution->settlecommission();
        goto JcvSY;
        v7KIh:
        if (!$res) {
            goto C0Yoe;
        }
        goto FiJ15;
        XuoIQ:
        $distribution = new Distribution();
        goto wi4W2;
        TG99e:
    }
    public function doPagedelkjorder()
    {
        goto JWWIL;
        x8Luo:
        $openid = $_GPC["openid"];
        goto k_3uX;
        k_3uX:
        $res = pdo_delete("ymktv_sun_kjorder", array("openid" => $openid, "id" => $id));
        goto eTKNp;
        eTKNp:
        echo json_encode($res);
        goto O1oE7;
        JWWIL:
        global $_W, $_GPC;
        goto ERJKL;
        ERJKL:
        $id = $_GPC["id"];
        goto x8Luo;
        O1oE7:
    }
    public function doPagedelkjjilu()
    {
        goto PyxRx;
        GqiYV:
        $res = pdo_delete("ymktv_sun_kjorder", array("openid" => $openid, "id" => $id));
        goto EGzyZ;
        PyxRx:
        global $_W, $_GPC;
        goto i5dqo;
        EGzyZ:
        echo json_encode($res);
        goto IOkbG;
        i5dqo:
        $id = $_GPC["id"];
        goto yqvyS;
        yqvyS:
        $openid = $_GPC["openid"];
        goto GqiYV;
        IOkbG:
    }
    public function doPagedeljkjilu()
    {
        goto WtsAc;
        PPMUN:
        $res = pdo_delete("ymktv_sun_user_active", array("uid" => $openid, "active_id" => $id));
        goto sFbcq;
        sFbcq:
        echo json_encode($res);
        goto nCeFF;
        WtsAc:
        global $_W, $_GPC;
        goto IXO4v;
        FRzDk:
        $openid = $_GPC["openid"];
        goto PPMUN;
        IXO4v:
        $id = $_GPC["id"];
        goto FRzDk;
        nCeFF:
    }
    public function doPageAddtalentcircle()
    {
        goto r8SV2;
        m7fmE:
        $data["uniacid"] = $_W["uniacid"];
        goto Bn_tb;
        r8SV2:
        global $_W, $_GPC;
        goto yruIG;
        Uvm2a:
        $res = pdo_insert("ymktv_sun_expert", $data);
        goto sLyUK;
        qZvXA:
        if (!($_W["is_talent"] == 1)) {
            goto XXmXm;
        }
        goto ijeZu;
        ijeZu:
        $data["isshow"] = 0;
        goto O1Y6f;
        Bn_tb:
        $data["content"] = $_GPC["content"];
        goto vT6N2;
        vT6N2:
        $data["release_time"] = date("Y-m-d H:i:s");
        goto qZvXA;
        O1Y6f:
        XXmXm:
        goto Uvm2a;
        ixJbX:
        echo json_encode($tz_id);
        goto WLQIp;
        sLyUK:
        $tz_id = pdo_insertid();
        goto ixJbX;
        yruIG:
        $data["user_id"] = $_GPC["user_id"];
        goto m7fmE;
        WLQIp:
    }
    public function doPageToupload()
    {
        goto zYPS4;
        ZQdmV:
        $data["imgs"] = $img . "," . $newimg;
        goto Ou7Ue;
        sxkza:
        $data["imgs"] = $newimg;
        goto NXacP;
        tMmmu:
        LTOAl:
        goto XbHU5;
        tk_RN:
        require_once TD_PATH . "/class/UploadFile.class.php";
        goto grpuC;
        XaHlb:
        @file_remote_upload($filename);
        goto xwRhT;
        zYPS4:
        global $_W, $_GPC;
        goto AlzVr;
        fILSD:
        echo 2;
        goto PoY6G;
        IqhMh:
        g9PEw:
        goto fILSD;
        wa_X6:
        $upload->maxSize = 30292200;
        goto Ov3R5;
        s6P0J:
        exit;
        goto rozyp;
        qSaIu:
        @(require_once IA_ROOT . "/framework/function/file.func.php");
        goto Zwlix;
        DTl1U:
        $upload->savePath = "../attachment/";
        goto QOtrC;
        IXG4Z:
        if ($img) {
            goto AoVcv;
        }
        goto sxkza;
        Chdqa:
        echo json_encode($upload->getErrorMsg());
        goto s6P0J;
        OxD50:
        $img = pdo_getcolumn("ymktv_sun_expert", array("id" => $tcid), "imgs");
        goto IXG4Z;
        WK548:
        AoVcv:
        goto ZQdmV;
        Zwlix:
        @($filename = $newimg);
        goto XaHlb;
        QOtrC:
        $upload->saveRule = uniqid;
        goto Vscn4;
        Cm_zP:
        $newimg = $uploadList["0"]["savename"];
        goto OxD50;
        AlzVr:
        $tcid = $_GPC["tcid"];
        goto cbuhb;
        P3PJp:
        if ($uploadList) {
            goto n6zqM;
        }
        goto Chdqa;
        cbuhb:
        if (!is_uploaded_file($_FILES["file"]["tmp_name"])) {
            goto g9PEw;
        }
        goto YBWAy;
        PoY6G:
        exit;
        goto tMmmu;
        Ov3R5:
        $upload->allowExts = explode(",", "png,gif,jpeg,pjpeg,bmp,x-png,jpg");
        goto DTl1U;
        cwhjm:
        echo json_encode($data);
        goto qSaIu;
        Vscn4:
        $uploadList = $upload->uploadOne($file);
        goto P3PJp;
        NXacP:
        goto GNaZ7;
        goto WK548;
        YBWAy:
        $file = $_FILES["file"];
        goto tk_RN;
        Ou7Ue:
        GNaZ7:
        goto Y3xpk;
        xwRhT:
        goto LTOAl;
        goto IqhMh;
        rozyp:
        n6zqM:
        goto Cm_zP;
        Y3xpk:
        $res = pdo_update("ymktv_sun_expert", $data, array("id" => $tcid));
        goto cwhjm;
        grpuC:
        $upload = new UploadFile();
        goto wa_X6;
        XbHU5:
    }
    public function doPageGetactive()
    {
        goto cFdIM;
        yfQsk:
        $pageindex = intval($_GPC["page"]) * $pagesize;
        goto kSqVv;
        XnVgc:
        if (sizeof($newData) > 0) {
            goto ZD193;
        }
        goto AxKOA;
        AxKOA:
        echo 2;
        goto PDsVh;
        rn1Ii:
        if ($is_shopen["is_shopen"] == 1) {
            goto Kk1HT;
        }
        goto b5tUd;
        ThUJm:
        $newData = array();
        goto IZMPd;
        cFdIM:
        global $_GPC, $_W;
        goto Q83PA;
        Pmcl8:
        $data = pdo_fetchall($sql);
        goto ThUJm;
        yQCQd:
        vm0CK:
        goto sidSL;
        eTfUO:
        u1ysU:
        goto Pmcl8;
        iY0li:
        ZD193:
        goto YvijB;
        YvijB:
        echo json_encode($newData);
        goto yQCQd;
        PDsVh:
        goto vm0CK;
        goto iY0li;
        Q83PA:
        $openid = $_GPC["openid"];
        goto ZeUZH;
        b5tUd:
        $sql = " SELECT * FROM " . tablename("ymktv_sun_user") . " u " . " JOIN " . tablename("ymktv_sun_expert") . " e " . " ON " . " e.user_id=u.openid" . " WHERE " . " e.uniacid=" . $_W["uniacid"] . " AND " . " u.uniacid=" . $_W["uniacid"] . " AND" . " isshow=1 " . " ORDER BY release_time DESC limit " . $pageindex . "," . $pagesize;
        goto CbjLL;
        ZeUZH:
        $pagesize = 5;
        goto yfQsk;
        cERmU:
        Kk1HT:
        goto gBoA_;
        IZMPd:
        foreach ($data as $k => $v) {
            goto X_pkc;
            cyCfv:
            MguI4:
            goto e3SLk;
            RIhH3:
            goto rWrCi;
            goto cyCfv;
            dmiPJ:
            $v["benren"] = 1;
            goto d0p4T;
            VW48L:
            array_push($newData, $v);
            goto boEnq;
            Nb8wT:
            if ($res) {
                goto MguI4;
            }
            goto cbi2B;
            Nx2Td:
            if ($re) {
                goto SsBq7;
            }
            goto R9vCo;
            sQKlZ:
            $res = pdo_get("ymktv_sun_zan", array("uniacid" => $_W["uniacid"], "expert_id" => $v["id"], "user_id" => $openid));
            goto fJYBU;
            sFOWG:
            goto i6NI9;
            goto cQMKr;
            lldPf:
            goto ABwbF;
            goto UDGS1;
            Q2WMd:
            $v["imglen"] = sizeof($v["imgs"]);
            goto EqGZZ;
            Q6yL1:
            ABwbF:
            goto t5Dcp;
            ns4Ts:
            $v["benren"] = 0;
            goto sFOWG;
            wlGcA:
            rWrCi:
            goto VW48L;
            Ww722:
            $v["isfollow"] = 1;
            goto Q6yL1;
            X_pkc:
            $v["imgs"] = explode(",", $v["imgs"]);
            goto Q2WMd;
            fJYBU:
            $re = pdo_get("ymktv_sun_attention", array("uniacid" => $_W["uniacid"], "attention_id" => $v["user_id"], "fans_id" => $openid));
            goto Nx2Td;
            UDGS1:
            SsBq7:
            goto Ww722;
            EqGZZ:
            $v["zanlen"] = sizeof(pdo_getall("ymktv_sun_zan", array("uniacid" => $_W["uniacid"], "expert_id" => $v["id"])));
            goto sQKlZ;
            t5Dcp:
            if ($v["user_id"] == $openid) {
                goto S9AEG;
            }
            goto ns4Ts;
            cbi2B:
            $v["iszan"] = 0;
            goto RIhH3;
            cQMKr:
            S9AEG:
            goto dmiPJ;
            e3SLk:
            $v["iszan"] = 1;
            goto wlGcA;
            d0p4T:
            i6NI9:
            goto Nb8wT;
            boEnq:
            DdUko:
            goto w5Ch9;
            R9vCo:
            $v["isfollow"] = 0;
            goto lldPf;
            w5Ch9:
        }
        goto rjz16;
        CbjLL:
        goto u1ysU;
        goto cERmU;
        kSqVv:
        $is_shopen = pdo_get("ymktv_sun_tab", array("uniacid" => $_W["uniacid"]));
        goto rn1Ii;
        rjz16:
        vgh2e:
        goto XnVgc;
        gBoA_:
        $sql = " SELECT * FROM " . tablename("ymktv_sun_user") . " u " . " JOIN " . tablename("ymktv_sun_expert") . " e " . " ON " . " e.user_id=u.openid" . " WHERE " . " e.uniacid=" . $_W["uniacid"] . " AND " . " u.uniacid=" . $_W["uniacid"] . " AND" . " isshow=1 " . " AND " . " e.isexamine=1" . " ORDER BY release_time DESC limit " . $pageindex . "," . $pagesize;
        goto eTfUO;
        sidSL:
    }
    public function doPageclickzan()
    {
        goto SyRju;
        GbOaK:
        PX0SO:
        goto wRLCa;
        kTNWR:
        goto PX0SO;
        goto NKSIT;
        BzN69:
        pdo_delete("ymktv_sun_zan", array("uniacid" => $_W["uniacid"], "user_id" => $openid, "expert_id" => $id));
        goto GbOaK;
        NKSIT:
        MqpMw:
        goto BzN69;
        SKw35:
        if ($res) {
            goto MqpMw;
        }
        goto rF25c;
        joQRf:
        $res = pdo_get("ymktv_sun_zan", array("uniacid" => $_W["uniacid"], "user_id" => $openid, "expert_id" => $id));
        goto SKw35;
        wRLCa:
        echo json_encode($res);
        goto ehhP5;
        FWPEJ:
        $data = array("uniacid" => $_W["uniacid"], "user_id" => $openid, "expert_id" => $id, "time" => date("Y-m-d H:i:s", time()));
        goto joQRf;
        FxE22:
        $openid = $_GPC["openid"];
        goto fENud;
        fENud:
        $id = $_GPC["id"];
        goto FWPEJ;
        rF25c:
        pdo_insert("ymktv_sun_zan", $data);
        goto kTNWR;
        SyRju:
        global $_W, $_GPC;
        goto FxE22;
        ehhP5:
    }
    public function doPageActiveDetails()
    {
        goto iLcD6;
        plSlf:
        kilCt:
        goto lEYiI;
        A59Bx:
        ioT0v:
        goto OC_RL;
        OC_RL:
        $data["isfollow"] = 1;
        goto GtSIE;
        el04u:
        $data["iszan"] = 1;
        goto Vx8X0;
        nMV2S:
        echo json_encode($data);
        goto ump5H;
        M3CYG:
        $data["imgs"] = explode(",", $data["imgs"]);
        goto eI0a0;
        iLcD6:
        global $_W, $_GPC;
        goto JsF1s;
        Vx8X0:
        IDekp:
        goto nMV2S;
        pLNJ9:
        $sql = $sql = " SELECT * FROM " . tablename("ymktv_sun_user") . " u " . " JOIN " . tablename("ymktv_sun_expert") . " e " . " ON " . " e.user_id=u.openid" . " WHERE " . " e.uniacid=" . $_W["uniacid"] . " AND" . " isshow=1 " . " AND " . " e.id=" . $id;
        goto PpPHM;
        HfcvO:
        if ($re) {
            goto ioT0v;
        }
        goto y7Vqg;
        JsF1s:
        $id = $_GPC["id"];
        goto euaZl;
        Na4cb:
        $data["benren"] = 0;
        goto HxbTP;
        Tjtuj:
        $res = pdo_get("ymktv_sun_zan", array("uniacid" => $_W["uniacid"], "expert_id" => $data["id"], "user_id" => $openid));
        goto cdUig;
        euaZl:
        $openid = $_GPC["openid"];
        goto pLNJ9;
        cdUig:
        $re = pdo_get("ymktv_sun_attention", array("uniacid" => $_W["uniacid"], "attention_id" => $data["openid"], "fans_id" => $openid));
        goto HO9fe;
        y7Vqg:
        $data["isfollow"] = 0;
        goto i7xoc;
        psHmX:
        N3Cpn:
        goto el04u;
        YQ8B8:
        if ($res) {
            goto N3Cpn;
        }
        goto cmyx9;
        GtSIE:
        MiPKG:
        goto YQ8B8;
        PpPHM:
        $data = pdo_fetch($sql);
        goto M3CYG;
        HO9fe:
        if ($data["user_id"] == $openid) {
            goto kilCt;
        }
        goto Na4cb;
        HxbTP:
        goto rgobZ;
        goto plSlf;
        ru1fy:
        goto IDekp;
        goto psHmX;
        eI0a0:
        $data["zanlen"] = sizeof(pdo_getall("ymktv_sun_zan", array("uniacid" => $_W["uniacid"], "expert_id" => $data["id"])));
        goto Tjtuj;
        lEYiI:
        $data["benren"] = 1;
        goto gHK79;
        i7xoc:
        goto MiPKG;
        goto A59Bx;
        cmyx9:
        $data["iszan"] = 0;
        goto ru1fy;
        gHK79:
        rgobZ:
        goto HfcvO;
        ump5H:
    }
    public function doPageComment()
    {
        goto KAdYe;
        rQ1s6:
        r77Xx:
        goto ZIqxH;
        eHkWX:
        pdo_update("ymktv_sun_expert", array("comment_num" => $num), array("uniacid" => $_W["uniacid"], "id" => $id));
        goto rQ1s6;
        XsOT5:
        if (!$res) {
            goto r77Xx;
        }
        goto J8117;
        M5OTj:
        $id = $_GPC["id"];
        goto wakZ0;
        gDHUb:
        $res = pdo_insert("ymktv_sun_expert_comment", $data);
        goto XsOT5;
        wakZ0:
        $openid = $_GPC["openid"];
        goto vASlb;
        J8117:
        $num = pdo_getcolumn("ymktv_sun_expert", array("uniacid" => $_W["uniacid"], "id" => $id), "comment_num");
        goto M4E3l;
        M4E3l:
        $num = $num + 1;
        goto eHkWX;
        NTWz8:
        $data = array("expert_id" => $id, "contents" => $contents, "release_time" => date("Y-m-d H:i:s", time()), "user_id" => $openid, "uniacid" => $_W["uniacid"]);
        goto gDHUb;
        KAdYe:
        global $_W, $_GPC;
        goto M5OTj;
        ZIqxH:
        echo json_encode($res);
        goto YKAiA;
        vASlb:
        $contents = $_GPC["contents"];
        goto NTWz8;
        YKAiA:
    }
    public function doPageUserComment()
    {
        goto g_bWj;
        jWrCr:
        $data = pdo_getall("ymktv_sun_expert_comment", array("uniacid" => $_W["uniacid"], "expert_id" => $id), '', '', "release_time DESC");
        goto bleN7;
        g_bWj:
        global $_W, $_GPC;
        goto swpGy;
        swpGy:
        $id = $_GPC["id"];
        goto jWrCr;
        bleN7:
        foreach ($data as $k => $v) {
            goto HyL6B;
            HyL6B:
            $data[$k]["img"] = pdo_getcolumn("ymktv_sun_user", array("uniacid" => $_W["uniacid"], "openid" => $v["user_id"]), "img");
            goto pWO6d;
            B_yn0:
            CSl2V:
            goto Lshe5;
            pWO6d:
            $data[$k]["name"] = pdo_getcolumn("ymktv_sun_user", array("uniacid" => $_W["uniacid"], "openid" => $v["user_id"]), "name");
            goto B_yn0;
            Lshe5:
        }
        goto xvQho;
        xvQho:
        eoPAL:
        goto ifdR3;
        ifdR3:
        echo json_encode($data);
        goto cpoxH;
        cpoxH:
    }
    public function doPageFollow()
    {
        goto YQzBu;
        K1eDF:
        echo json_encode($res);
        goto zdpF0;
        twWrB:
        pdo_delete("ymktv_sun_attention", array("uniacid" => $_W["uniacid"], "attention_id" => $user_id, "fans_id" => $openid));
        goto gfIYl;
        PhNMN:
        pdo_insert("ymktv_sun_attention", $data);
        goto kTkVx;
        waydE:
        BJIFO:
        goto JJVNG;
        RgijD:
        deIW5:
        goto NXMBB;
        JJVNG:
        $data = array("attention_id" => $user_id, "fans_id" => $openid, "uniacid" => $_W["uniacid"], "a_time" => date("Y-m-d H:i:s", time()));
        goto UtDo0;
        YQzBu:
        global $_GPC, $_W;
        goto mg2F2;
        Ww7Js:
        if ($res) {
            goto deIW5;
        }
        goto PhNMN;
        NXMBB:
        pdo_delete("ymktv_sun_attention", array("uniacid" => $_W["uniacid"], "attention_id" => $openid, "fans_id" => $user_id));
        goto ICCBE;
        lZkzW:
        OBQHU:
        goto twWrB;
        ICCBE:
        fOzjs:
        goto jijI0;
        PRNE8:
        pdo_insert("ymktv_sun_attention", $data);
        goto QZiV3;
        INudC:
        if ($_GPC["is_hu"] == 1) {
            goto BJIFO;
        }
        goto Lar7f;
        Lar7f:
        $data = array("attention_id" => $openid, "fans_id" => $user_id, "uniacid" => $_W["uniacid"], "a_time" => date("Y-m-d H:i:s", time()));
        goto X407P;
        UtDo0:
        $res = pdo_get("ymktv_sun_attention", array("uniacid" => $_W["uniacid"], "attention_id" => $user_id, "fans_id" => $openid));
        goto lO7Nq;
        QZiV3:
        goto VygCX;
        goto lZkzW;
        n5lDh:
        $openid = $_GPC["openid"];
        goto INudC;
        AJmmu:
        lvs3i:
        goto K1eDF;
        mg2F2:
        $user_id = $_GPC["user_id"];
        goto n5lDh;
        gfIYl:
        VygCX:
        goto AJmmu;
        kTkVx:
        goto fOzjs;
        goto RgijD;
        lO7Nq:
        if ($res) {
            goto OBQHU;
        }
        goto PRNE8;
        jijI0:
        goto lvs3i;
        goto waydE;
        X407P:
        $res = pdo_get("ymktv_sun_attention", array("uniacid" => $_W["uniacid"], "attention_id" => $openid, "fans_id" => $user_id));
        goto Ww7Js;
        zdpF0:
    }
    public function doPagePersonal()
    {
        goto WRKYf;
        o8x22:
        $balance = 0;
        goto u_S3U;
        T34_P:
        if ($balance) {
            goto Zo9BT;
        }
        goto o8x22;
        u_S3U:
        Zo9BT:
        goto qLOfA;
        m1u9_:
        $balance = pdo_getcolumn("ymktv_sun_user_balance", array("uniacid" => $_W["uniacid"], "openid" => $openid), "money");
        goto T34_P;
        WRKYf:
        global $_W, $_GPC;
        goto MyUh8;
        YudS7:
        $isvip = pdo_getcolumn("ymktv_sun_vipopen", array("uniacid" => $_W["uniacid"], "openid" => $openid), "isopen");
        goto m1u9_;
        kBzEb:
        echo json_encode($data);
        goto PVzuX;
        UbJKM:
        $fans = sizeof(pdo_getall("ymktv_sun_attention", array("uniacid" => $_W["uniacid"], "attention_id" => $openid)));
        goto YudS7;
        qLOfA:
        $data = array("money" => $money, "fans" => $fans, "atten" => $atten, "isopen" => $isvip, "balance" => $balance);
        goto kBzEb;
        MyUh8:
        $openid = $_GPC["openid"];
        goto U8enw;
        o_u8L:
        $atten = sizeof(pdo_getall("ymktv_sun_attention", array("uniacid" => $_W["uniacid"], "fans_id" => $openid)));
        goto UbJKM;
        U8enw:
        $money = pdo_getcolumn("ymktv_sun_user", array("uniacid" => $_W["uniacid"], "openid" => $openid), "money");
        goto o_u8L;
        PVzuX:
    }
    public function doPageUserattention()
    {
        goto Cxcr4;
        ZN74o:
        $openid = $_GPC["openid"];
        goto D0_B9;
        Cxcr4:
        global $_GPC, $_W;
        goto ZN74o;
        LY756:
        foreach ($data as $k => $v) {
            $data[$k]["isfollow"] = 1;
            oYSO_:
        }
        goto ASNev;
        lQcfE:
        $data = pdo_fetchall($sql);
        goto LY756;
        D0_B9:
        $sql = " SELECT * FROM " . tablename("ymktv_sun_attention") . " a " . " JOIN " . tablename("ymktv_sun_user") . " u " . " ON " . " a.attention_id=u.openid" . " WHERE " . " a.fans_id=" . "'{$openid}'" . " AND " . " a.uniacid=" . $_W["uniacid"] . " ORDER BY " . " a.a_time DESC";
        goto lQcfE;
        ht5_I:
        echo json_encode($data);
        goto Zqvou;
        ASNev:
        YkEyx:
        goto ht5_I;
        Zqvou:
    }
    public function doPageUserfans()
    {
        goto gYDGQ;
        a2YjJ:
        foreach ($data as $k => $v) {
            goto iyoNp;
            tPInP:
            QWGFw:
            goto u7pKI;
            gQjQa:
            PnqTK:
            goto C2wYj;
            iyoNp:
            $re = pdo_get("ymktv_sun_attention", array("uniacid" => $_W["uniacid"], "attention_id" => $v["fans_id"], "fans_id" => $openid));
            goto ittRm;
            dPRVE:
            Ou_H9:
            goto tPInP;
            BRlea:
            $data[$k]["isfollow"] = 0;
            goto wbUGt;
            wbUGt:
            goto Ou_H9;
            goto gQjQa;
            ittRm:
            if ($re) {
                goto PnqTK;
            }
            goto BRlea;
            C2wYj:
            $data[$k]["isfollow"] = 1;
            goto dPRVE;
            u7pKI:
        }
        goto Umi4L;
        KeVii:
        $openid = $_GPC["openid"];
        goto xUs4M;
        xUs4M:
        $sql = " SELECT * FROM " . tablename("ymktv_sun_attention") . " a " . " JOIN " . tablename("ymktv_sun_user") . " u " . " ON " . " a.fans_id=u.openid" . " WHERE " . " a.attention_id=" . "'{$openid}'" . " AND " . " a.uniacid=" . $_W["uniacid"] . " ORDER BY " . " a.a_time DESC";
        goto ZoJoH;
        Umi4L:
        JbQL5:
        goto IkbKT;
        gYDGQ:
        global $_GPC, $_W;
        goto KeVii;
        IkbKT:
        echo json_encode($data);
        goto q4bBj;
        ZoJoH:
        $data = pdo_fetchall($sql);
        goto a2YjJ;
        q4bBj:
    }
    public function doPageUserdynce()
    {
        goto sEoj4;
        xK40z:
        $i++;
        goto TP6Y1;
        sEoj4:
        global $_W, $_GPC;
        goto Pk9LM;
        jqNXm:
        $re = explode(",", $data[0]["imgs"]);
        goto PEVDD;
        wt3ER:
        $res[] = $re[$i];
        goto T9aI4;
        lf72w:
        if (!($i < 3)) {
            goto OsXJM;
        }
        goto fdbau;
        rqkWy:
        echo json_encode($res);
        goto MCEtK;
        LX_5U:
        $i = 0;
        goto Yv7HK;
        XEYxx:
        OsXJM:
        goto rqkWy;
        fdbau:
        if (!($re[$i] != null || $re[$i])) {
            goto CKwug;
        }
        goto wt3ER;
        Yv7HK:
        FvHG3:
        goto lf72w;
        T9aI4:
        CKwug:
        goto FNyJG;
        Pk9LM:
        $openid = $_GPC["openid"];
        goto PsDpC;
        PEVDD:
        $res = array();
        goto LX_5U;
        PsDpC:
        $data = pdo_getall("ymktv_sun_expert", array("uniacid" => $_W["uniacid"], "user_id" => $openid), '', '', "release_time DESC");
        goto jqNXm;
        TP6Y1:
        goto FvHG3;
        goto XEYxx;
        FNyJG:
        ydiUQ:
        goto xK40z;
        MCEtK:
    }
    public function doPageindexCard()
    {
        goto nKMI2;
        h6a3s:
        $bid = $_GPC["bid"];
        goto qahwn;
        GcvAP:
        $data[0] = 0;
        goto pDSps;
        w8wRM:
        foreach ($active as $k => $v) {
            goto WtpGC;
            WtpGC:
            if (!in_array($bid, explode(",", $v["build_id"]))) {
                goto NtBTj;
            }
            goto wj2PZ;
            zy3xw:
            NtBTj:
            goto gJ4TB;
            gJ4TB:
            pZoKE:
            goto GZiuB;
            wj2PZ:
            $data[] = $v;
            goto zy3xw;
            GZiuB:
        }
        goto Pw1vT;
        yRc6k:
        e7DDw:
        goto WL41z;
        oo5HE:
        $uid = array();
        goto gkH92;
        VK4gR:
        ANjlL:
        goto grEIX;
        uXh2l:
        foreach ($uid as $k => $v) {
            goto C1aUo;
            vl356:
            qLff1:
            goto L2hvM;
            Jv7gW:
            $img[] = pdo_getcolumn("ymktv_sun_user", array("uniacid" => $_W["uniacid"], "openid" => $v), "img");
            goto fHazW;
            A9GcT:
            NkEti:
            goto FAZSd;
            C1aUo:
            if (sizeof($img) > 4) {
                goto NkEti;
            }
            goto Jv7gW;
            fHazW:
            goto qLff1;
            goto A9GcT;
            L2hvM:
            Hfs0J:
            goto rv8TV;
            FAZSd:
            goto Hfs0J;
            goto vl356;
            rv8TV:
        }
        goto yRc6k;
        nKMI2:
        global $_GPC, $_W;
        goto h6a3s;
        baABh:
        foreach ($data as $k => $v) {
            goto aNWZ_;
            fCad6:
            $data[$k]["clock"] = '';
            goto zUh47;
            zUh47:
            $data[$k]["lb_imgs"] = explode(",", $v["lb_imgs"]);
            goto JWIIj;
            JWIIj:
            K9jWN:
            goto UDfbs;
            aNWZ_:
            $data[$k]["antime"] = strtotime($v["antime"]) * 1000;
            goto fCad6;
            UDfbs:
        }
        goto bGSKA;
        bGSKA:
        rlTO0:
        goto zMf8H;
        DvkkL:
        $img = array();
        goto uXh2l;
        sGYc6:
        zTJBw:
        goto fGg__;
        qahwn:
        $active = pdo_getall("ymktv_sun_active", array("uniacid" => $_W["uniacid"], "status" => 1, "showindex" => 1, "antime >" => date("Y-m-d H:i:s", time())), '', '', "createtime DESC", "1");
        goto A5Nix;
        grEIX:
        $data = array();
        goto w8wRM;
        xHMjY:
        if (empty($data)) {
            goto e1mV2;
        }
        goto baABh;
        o19Rk:
        sj1Sq:
        goto DvkkL;
        Pw1vT:
        H9SBd:
        goto xHMjY;
        fGg__:
        echo json_encode($data);
        goto iObZb;
        A5Nix:
        if ($active) {
            goto ANjlL;
        }
        goto GcvAP;
        gkH92:
        foreach ($useractive as $k => $v) {
            $uid[$v["uid"]] = $v["uid"];
            Y2754:
        }
        goto o19Rk;
        pDSps:
        goto zTJBw;
        goto VK4gR;
        WL41z:
        $data[0]["img"] = $img;
        goto sGYc6;
        c6ofP:
        $useractive = pdo_getall("ymktv_sun_user_active", array("uniacid" => $_W["uniacid"], "active_id" => $data[0]["id"]));
        goto oo5HE;
        zMf8H:
        e1mV2:
        goto c6ofP;
        iObZb:
    }
    public function doPageCardcollecting()
    {
        goto kJfd_;
        Nclyy:
        foreach ($data as $k => $v) {
            goto vYYnJ;
            vYYnJ:
            if (date("Y-m-d H:i:s", time()) > $v["antime"]) {
                goto jMCCj;
            }
            goto sBDQC;
            LLwhh:
            $data[$k]["btn"] = 1;
            goto smjMr;
            smjMr:
            gGJ8P:
            goto pMGek;
            zBTHW:
            goto gGJ8P;
            goto hXE1w;
            sBDQC:
            $data[$k]["btn"] = 0;
            goto zBTHW;
            pMGek:
            goto zfZAT;
            zfZAT:
            sufHe:
            goto rqXtg;
            hXE1w:
            jMCCj:
            goto LLwhh;
            rqXtg:
        }
        goto zR4Zd;
        bQ4KM:
        $active = pdo_getall("ymktv_sun_active", array("uniacid" => $_W["uniacid"], "status" => 1), '', '', "sort DESC");
        goto kchOz;
        kJfd_:
        global $_W, $_GPC;
        goto pUb7l;
        pUb7l:
        $bid = $_GPC["bid"];
        goto bQ4KM;
        kchOz:
        $data = array();
        goto coOOn;
        umllS:
        echo json_encode($data);
        goto xD8kb;
        zR4Zd:
        mL9Tr:
        goto umllS;
        m7LT3:
        VeD7e:
        goto Nclyy;
        coOOn:
        foreach ($active as $k => $v) {
            goto X36IA;
            aBxdo:
            lyk7J:
            goto Q85Dv;
            iGXB1:
            qjMB8:
            goto aBxdo;
            hWa83:
            $data[] = $v;
            goto iGXB1;
            X36IA:
            if (!in_array($bid, explode(",", $v["build_id"]))) {
                goto qjMB8;
            }
            goto hWa83;
            Q85Dv:
        }
        goto m7LT3;
        xD8kb:
    }
    public function doPageCardIdData()
    {
        goto Bh8Zg;
        YDMTY:
        $id = $_GPC["id"];
        goto WjtJ1;
        Aq7pb:
        $data[0]["num"] = $useractive[0]["jikanum"];
        goto hvSnO;
        Of7z6:
        if (!$useractive) {
            goto ibOme;
        }
        goto Aq7pb;
        hvSnO:
        ibOme:
        goto hoHCc;
        B2GPd:
        foreach ($data as $k => $v) {
            goto joOki;
            tvluQ:
            $data[$k]["clock"] = '';
            goto bd6kS;
            MxyUr:
            E0pb7:
            goto BRTGj;
            joOki:
            $data[$k]["antime"] = strtotime($v["antime"]) * 1000;
            goto tvluQ;
            zsg2Y:
            $data[$k]["lb_imgs"] = explode(",", $v["lb_imgs"]);
            goto MxyUr;
            bd6kS:
            $data[$k]["jikanum"] = sizeof(pdo_getall("ymktv_sun_gift", array("uniacid" => $_W["uniacid"], "pid" => $id)));
            goto zsg2Y;
            BRTGj:
        }
        goto j1tzA;
        WjtJ1:
        $openid = $_GPC["openid"];
        goto T_wly;
        hoHCc:
        echo json_encode($data);
        goto BaL82;
        Bh8Zg:
        global $_GPC, $_W;
        goto YDMTY;
        j1tzA:
        uUYQt:
        goto kadAE;
        T_wly:
        $data = pdo_getall("ymktv_sun_active", array("uniacid" => $_W["uniacid"], "id" => $id));
        goto B2GPd;
        kadAE:
        $useractive = pdo_getall("ymktv_sun_user_active", array("uniacid" => $_W["uniacid"], "active_id" => $data[0]["id"], "uid" => $openid));
        goto Of7z6;
        BaL82:
    }
    public function doPageCardData()
    {
        goto Jl07h;
        Jl07h:
        global $_GPC, $_W;
        goto zXfgv;
        LLpyz:
        foreach ($data as $k => $v) {
            goto Ph9UO;
            qeO1P:
            MTpDF:
            goto etaxT;
            eLtY8:
            if ($kan) {
                goto B4RdN;
            }
            goto iNhbI;
            kKuqN:
            B4RdN:
            goto ri1pU;
            etaxT:
            Hom12:
            goto kj0Gv;
            iNhbI:
            $data[$k]["num"] = 0;
            goto Zu1dY;
            Zu1dY:
            goto MTpDF;
            goto kKuqN;
            Ph9UO:
            $kan = pdo_get("ymktv_sun_user_active", array("uniacid" => $_W["uniacid"], "uid" => $openid, "kapian_id" => $v["id"], "active_id" => $pid));
            goto eLtY8;
            ri1pU:
            $data[$k]["num"] = $kan["num"];
            goto qeO1P;
            kj0Gv:
        }
        goto H5UbN;
        huoD2:
        echo json_encode($data);
        goto Kdq5H;
        zXfgv:
        $pid = $_GPC["id"];
        goto op1l9;
        H5UbN:
        V8jhj:
        goto huoD2;
        op1l9:
        $openid = $_GPC["openid"];
        goto gcekU;
        gcekU:
        $data = pdo_getall("ymktv_sun_gift", array("uniacid" => $_W["uniacid"], "pid" => $pid), '', '', "id DESC");
        goto LLpyz;
        Kdq5H:
    }
    public function doPageTab()
    {
        goto HiW4a;
        CSuGd:
        $data = pdo_get("ymktv_sun_tab", array("uniacid" => $_W["uniacid"]));
        goto fGfU9;
        HiW4a:
        global $_W;
        goto CSuGd;
        fGfU9:
        echo json_encode($data);
        goto pjQXB;
        pjQXB:
    }
    public function doPageGetCard()
    {
        goto J2osu;
        apNzm:
        AM8Vr:
        goto tp9qH;
        VmwKk:
        $kpData = pdo_get("ymktv_sun_user_active", array("uniacid" => $_W["uniacid"], "uid" => $uid, "active_id" => $pid, "kapian_id" => $kpid, "build_id" => $bid));
        goto Yh7l6;
        bIF66:
        if (empty($useractive)) {
            goto Fu3W6;
        }
        goto pG6Bu;
        B17Wx:
        $data["num"] = 1;
        goto QpnVY;
        J2osu:
        global $_W, $_GPC;
        goto XP8Pm;
        ORW15:
        Fu3W6:
        goto TxIy5;
        DJ6YW:
        $gift = pdo_getall("ymktv_sun_gift", array("uniacid" => $_W["uniacid"], "pid" => $pid), '', '', "id DESC");
        goto Awpkk;
        YbS5q:
        goto zIfVY;
        goto JgYsK;
        r2XcX:
        return $this->result(1, "请勿重复请求！", null);
        goto PlowD;
        n2ktK:
        $data = array("uniacid" => $_W["uniacid"], "uid" => $uid, "img" => pdo_getcolumn("ymktv_sun_gift", array("uniacid" => $_W["uniacid"], "id" => $kpid), "thumb"), "kapian_id" => $kpid, "active_id" => $pid, "build_id" => $bid);
        goto bIF66;
        z0SYq:
        pdo_update("ymktv_sun_active", array("new_partnum" => $active["new_partnum"] + 1), array("uniacid" => $_W["uniacid"], "id" => $pid, "build_id" => $bid));
        goto d27WO;
        IBoZ9:
        pdo_insert("ymktv_sun_user_active", $data);
        goto AFy45;
        lTcnH:
        $kpid = $this->get_rand($ac);
        goto AU8G1;
        d27WO:
        T9cRg:
        goto uD12X;
        Afngb:
        tTKdu:
        goto umJmu;
        m14am:
        Ck1bQ:
        goto GqflG;
        RRkbF:
        if (!($current_timestamp - 30 > $req_timestamp / 1000)) {
            goto WwaZo;
        }
        goto r2XcX;
        Ef9p9:
        $key = "alsjdlqkwjlke123654!@#!@81903890";
        goto i09n_;
        ECEPf:
        H5RLd:
        goto lTcnH;
        u4yuc:
        Fpq0f:
        goto SP3kD;
        PlowD:
        WwaZo:
        goto waAKW;
        dpXK6:
        $uid = $_GPC["openid"];
        goto vgYC0;
        AU8G1:
        $active = pdo_get("ymktv_sun_active", array("uniacid" => $_W["uniacid"], "id" => $pid));
        goto Aj26t;
        Yh7l6:
        if ($kpData) {
            goto Ck1bQ;
        }
        goto B17Wx;
        yQQT3:
        return $this->result(1, "非法请求！", null);
        goto N2uFm;
        vbeE6:
        echo json_encode($newData);
        goto JZyHe;
        AFy45:
        goto AM8Vr;
        goto m14am;
        SP3kD:
        if (count($ling) == count($gift)) {
            goto s5H02;
        }
        goto BF0jx;
        pG6Bu:
        if (!($useractive[0]["jikanum"] <= 0 || $active["num"] <= 0)) {
            goto tTKdu;
        }
        goto opLE5;
        uD12X:
        $kapian = pdo_getcolumn("ymktv_sun_gift", array("uniacid" => $_W["uniacid"], "id" => $kpid), "thumb");
        goto zqnjC;
        A1mFq:
        zIfVY:
        goto Y2QeE;
        GqflG:
        pdo_update("ymktv_sun_user_active", array("num" => $kpData["num"] + 1), array("uniacid" => $_W["uniacid"], "uid" => $uid, "active_id" => $pid, "kapian_id" => $kpid));
        goto apNzm;
        XP8Pm:
        $bid = $_GPC["bid"];
        goto dpXK6;
        Y2QeE:
        $newData = array("img" => $kapian, "giftData" => $gift, "ling" => $lings);
        goto vbeE6;
        MghKi:
        $lings = 1;
        goto A1mFq;
        XAnb7:
        foreach ($gift as $k => $v) {
            goto kHYl_;
            JWLzV:
            if (!($gift[$k]["num"] != 0)) {
                goto YhWN0;
            }
            goto oolgo;
            YvaSB:
            if ($kan) {
                goto oGTgS;
            }
            goto Xg31p;
            iKPMI:
            oGTgS:
            goto TRvLP;
            kHYl_:
            $kan = pdo_get("ymktv_sun_user_active", array("uniacid" => $_W["uniacid"], "uid" => $uid, "kapian_id" => $v["id"], "active_id" => $pid));
            goto YvaSB;
            E0OYY:
            D_ZbE:
            goto JWLzV;
            Em3N8:
            YhWN0:
            goto s0N7d;
            oolgo:
            $ling[] = $v;
            goto Em3N8;
            UZe_Y:
            goto D_ZbE;
            goto iKPMI;
            TRvLP:
            $gift[$k]["num"] = $kan["num"];
            goto E0OYY;
            s0N7d:
            H3mb_:
            goto rKfn5;
            Xg31p:
            $gift[$k]["num"] = 0;
            goto UZe_Y;
            rKfn5:
        }
        goto u4yuc;
        opLE5:
        return $this->result(1, "没有次数了！", null);
        goto Afngb;
        zqnjC:
        $ling = array();
        goto XAnb7;
        ytUjD:
        goto T9cRg;
        goto ORW15;
        flUgq:
        $current_timestamp = time();
        goto Qm89E;
        waAKW:
        if (!($my_t !== $t)) {
            goto U29ay;
        }
        goto yQQT3;
        tp9qH:
        pdo_update("ymktv_sun_user_active", array("jikanum" => $data["jikanum"]), array("uniacid" => $_W["uniacid"], "active_id" => $pid, "uid" => $uid, "build_id" => $bid));
        goto ytUjD;
        umJmu:
        $data["jikanum"] = $useractive[0]["jikanum"] - 1;
        goto VmwKk;
        JgYsK:
        s5H02:
        goto MghKi;
        ytMbK:
        $req_timestamp = $_GPC["timestamp"];
        goto flUgq;
        qC3R2:
        pdo_insert("ymktv_sun_user_active", $data);
        goto z0SYq;
        Awpkk:
        foreach ($gift as $k => $v) {
            $ac[$v["id"]] = $v["rate"];
            AEIhu:
        }
        goto ECEPf;
        guS00:
        $data["sharenum"] = $active["sharenum"];
        goto qC3R2;
        BF0jx:
        $lings = 0;
        goto YbS5q;
        znCG0:
        $data["num"] = 1;
        goto guS00;
        vgYC0:
        $pid = $_GPC["pid"];
        goto ytMbK;
        QpnVY:
        $data["sharenum"] = pdo_getcolumn("ymktv_sun_user_active", array("uniacid" => $_W["uniacid"], "active_id" => $pid, "uid" => $uid, "build_id" => $bid), "sharenum");
        goto IBoZ9;
        TxIy5:
        $data["jikanum"] = $active["num"] - 1;
        goto znCG0;
        Aj26t:
        $useractive = pdo_getall("ymktv_sun_user_active", array("uniacid" => $_W["uniacid"], "uid" => $uid, "active_id" => $pid, "build_id" => $bid));
        goto n2ktK;
        Qm89E:
        $t = $_GPC["t"];
        goto Ef9p9;
        N2uFm:
        U29ay:
        goto DJ6YW;
        i09n_:
        $my_t = base64_encode($req_timestamp . "???" . $key);
        goto RRkbF;
        JZyHe:
    }
    public function get_rand($proArr)
    {
        goto S9W3R;
        SzfWM:
        unset($proArr);
        goto Y9_2e;
        zXJHi:
        foreach ($proArr as $key => $proCur) {
            goto L4KYw;
            kFaZG:
            goto b3cOy;
            goto mtfS8;
            CGNBk:
            if ($randNum <= $proCur) {
                goto jhkJG;
            }
            goto BghKz;
            L4KYw:
            $randNum = mt_rand(1, $proSum);
            goto CGNBk;
            BghKz:
            $proSum -= $proCur;
            goto kFaZG;
            sjJao:
            goto e9r4F;
            goto BSSB8;
            BSSB8:
            b3cOy:
            goto npDY2;
            npDY2:
            Lb96g:
            goto HRoN3;
            mtfS8:
            jhkJG:
            goto z6Vaf;
            z6Vaf:
            $result = $key;
            goto sjJao;
            HRoN3:
        }
        goto aMIZS;
        S9W3R:
        $proSum = array_sum($proArr);
        goto zXJHi;
        aMIZS:
        e9r4F:
        goto SzfWM;
        Y9_2e:
        return $result;
        goto CdjFz;
        CdjFz:
    }
    public function doPageForwardnum()
    {
        goto LHJ4N;
        LHJ4N:
        global $_W, $_GPC;
        goto X5lJa;
        J4bF1:
        $newData = array("share_plus" => $share_plus, "sharenum" => pdo_getcolumn("ymktv_sun_user_active", array("uniacid" => $_W["uniacid"], "uid" => $openid, "active_id" => $id), "sharenum"));
        goto LfeKa;
        GJDvv:
        $newData = array("share_plus" => $share_plus, "sharenum" => pdo_getcolumn("ymktv_sun_user_active", array("uniacid" => $_W["uniacid"], "uid" => $openid, "active_id" => $id), "sharenum"));
        goto GdAS9;
        lCNX7:
        zGSD0:
        goto fFHck;
        oZgtO:
        $useractive = pdo_getall("ymktv_sun_user_active", array("uniacid" => $_W["uniacid"], "uid" => $openid, "active_id" => $id));
        goto vhDiu;
        X5lJa:
        $id = $_GPC["id"];
        goto R8_2g;
        H19Ou:
        DBy5Z:
        goto J4bF1;
        DtumB:
        $active = pdo_get("ymktv_sun_active", array("uniacid" => $_W["uniacid"], "id" => $id));
        goto oZgtO;
        GdAS9:
        goto zGSD0;
        goto H19Ou;
        vhDiu:
        $share_plus = $active["share_plus"];
        goto T0T1w;
        R8_2g:
        $openid = $_GPC["openid"];
        goto DtumB;
        T0T1w:
        if ($useractive[0]["sharenum"] > 0) {
            goto DBy5Z;
        }
        goto GJDvv;
        LfeKa:
        pdo_update("ymktv_sun_user_active", array("jikanum" => $useractive[0]["jikanum"] + $share_plus, "sharenum" => $useractive[0]["sharenum"] - 1), array("uniacid" => $_W["uniacid"], "uid" => $openid, "active_id" => $id));
        goto lCNX7;
        fFHck:
        echo json_encode($newData);
        goto hiwQJ;
        hiwQJ:
    }
    public function doPagePrizeData()
    {
        goto l_oUJ;
        w1tqK:
        $data = pdo_get("ymktv_sun_active", array("uniacid" => $_W["uniacid"], "id" => $pid));
        goto C754a;
        l_oUJ:
        global $_W, $_GPC;
        goto iQnXr;
        iQnXr:
        $pid = $_GPC["pid"];
        goto w1tqK;
        C754a:
        echo json_encode($data);
        goto CahP7;
        CahP7:
    }
    public function doPageGiftData()
    {
        goto ijrVI;
        tzve8:
        goto vbiZQ;
        goto EqlPq;
        QMwTQ:
        if ($active["active_num"] > 0) {
            goto HzgZR;
        }
        goto TUKc1;
        e_K_A:
        if ($oldData) {
            goto LNHp6;
        }
        goto QMwTQ;
        yn60J:
        t23vm:
        goto tzve8;
        ozoRs:
        goto TlS1l;
        ijrVI:
        global $_GPC, $_W;
        goto E3QDo;
        yQAsW:
        $active = pdo_get("ymktv_sun_active", array("uniacid" => $_W["uniacid"], "id" => $pid));
        goto bz0oR;
        zYyRq:
        $remark = $_GPC["remark"];
        goto V1LLs;
        a7RFd:
        if (!$res) {
            goto Q2rc6;
        }
        goto qhoKh;
        tMGEj:
        $address = $_GPC["address"];
        goto SFK3M;
        KuDFA:
        echo json_encode($res);
        goto gb4_H;
        VFBnN:
        $username = $_GPC["username"];
        goto zYyRq;
        bz0oR:
        $data = array("uniacid" => $_W["uniacid"], "pid" => $pid, "uid" => $openid, "createtime" => date("Y-m-d H:i:s", time()), "consignee" => $username, "tel" => $tel, "note" => $remark, "address" => $address, "title" => $active["title"], "thumb" => $active["thumb"], "build_id" => $bid);
        goto dhNSC;
        dhNSC:
        $oldData = pdo_get("ymktv_sun_gift_order", array("uniacid" => $_W["uniacid"], "pid" => $pid, "uid" => $openid));
        goto e_K_A;
        rB7W_:
        HzgZR:
        goto h6c13;
        E3QDo:
        $bid = $_GPC["bid"];
        goto NzD4l;
        h6c13:
        $res = pdo_insert("ymktv_sun_gift_order", $data);
        goto a7RFd;
        TUKc1:
        $res = 3;
        goto FqASA;
        qhoKh:
        pdo_update("ymktv_sun_user_active", array("isprize" => 1), array("uniacid" => $_W["uniacid"], "active_id" => $pid, "uid" => $openid));
        goto cICdK;
        TlS1l:
        vbiZQ:
        goto KuDFA;
        V1LLs:
        $tel = $_GPC["tel"];
        goto tMGEj;
        Bo_mv:
        Q2rc6:
        goto yn60J;
        NzD4l:
        $pid = $_GPC["id"];
        goto VFBnN;
        cICdK:
        pdo_update("ymktv_sun_active", array("active_num" => $active["active_num"] - 1), array("uniacid" => $_W["uniacid"], "id" => $pid));
        goto Bo_mv;
        EqlPq:
        LNHp6:
        goto LZze7;
        LZze7:
        $res = 2;
        goto ozoRs;
        SFK3M:
        $openid = $_GPC["openid"];
        goto yQAsW;
        FqASA:
        goto t23vm;
        goto rB7W_;
        gb4_H:
    }
    public function doPageusergift()
    {
        goto FxpSo;
        FxpSo:
        global $_GPC, $_W;
        goto sK2w_;
        b4pri:
        $data = pdo_getall("ymktv_sun_gift_order", array("uniacid" => $_W["uniacid"], "uid" => $openid, "isat" => 0, "build_id" => $bid), '', '', "createtime DESC");
        goto AK579;
        bAsbS:
        $bid = $_GPC["bid"];
        goto b4pri;
        sK2w_:
        $openid = $_GPC["openid"];
        goto bAsbS;
        AK579:
        echo json_encode($data);
        goto vdXCI;
        vdXCI:
    }
    public function doPageWusergift()
    {
        goto BjlUS;
        EJlqz:
        echo json_encode($data);
        goto v7A4H;
        BtNNo:
        $data = pdo_getall("ymktv_sun_gift_order", array("uniacid" => $_W["uniacid"], "uid" => $openid, "isat" => 0, "state" => 0, "build_id" => $bid), '', '', "createtime DESC");
        goto EJlqz;
        mVogg:
        $openid = $_GPC["openid"];
        goto rKaHw;
        BjlUS:
        global $_GPC, $_W;
        goto mVogg;
        rKaHw:
        $bid = $_GPC["bid"];
        goto BtNNo;
        v7A4H:
    }
    public function doPageYusergift()
    {
        goto b4xRz;
        FPJgz:
        $openid = $_GPC["openid"];
        goto jv1OM;
        b4xRz:
        global $_GPC, $_W;
        goto FPJgz;
        eOoB0:
        echo json_encode($data);
        goto j6N2s;
        jv1OM:
        $bid = $_GPC["bid"];
        goto t_uuT;
        t_uuT:
        $data = pdo_getall("ymktv_sun_gift_order", array("uniacid" => $_W["uniacid"], "uid" => $openid, "isat" => 0, "state" => 1, "build_id" => $bid), '', '', "createtime DESC");
        goto eOoB0;
        j6N2s:
    }
    public function doPagegiftqueren()
    {
        goto zNAEY;
        v7Gsu:
        echo json_encode($res);
        goto Jh6vy;
        IyIMZ:
        $res = pdo_update("ymktv_sun_gift_order", array("state" => 1), array("uniacid" => $_W["uniacid"], "id" => $id, "uid" => $openid));
        goto v7Gsu;
        HAvV3:
        $openid = $_GPC["openid"];
        goto IyIMZ;
        zNAEY:
        global $_W, $_GPC;
        goto NXRs8;
        NXRs8:
        $id = $_GPC["id"];
        goto HAvV3;
        Jh6vy:
    }
    public function doPagedelgift()
    {
        goto wMoYa;
        Xhcx8:
        echo json_encode($res);
        goto eEkeu;
        ClBAI:
        $openid = $_GPC["openid"];
        goto hB3B1;
        wMoYa:
        global $_W, $_GPC;
        goto rQocf;
        rQocf:
        $id = $_GPC["id"];
        goto ClBAI;
        hB3B1:
        $res = pdo_update("ymktv_sun_gift_order", array("isat" => 1), array("uniacid" => $_W["uniacid"], "id" => $id, "uid" => $openid));
        goto Xhcx8;
        eEkeu:
    }
    public function doPageUserIsgift()
    {
        goto TfG1L;
        TfG1L:
        global $_W, $_GPC;
        goto riwSx;
        JUP8B:
        $pid = $_GPC["id"];
        goto VOJKl;
        fiedz:
        goto z2OGr;
        goto zo0FN;
        zo0FN:
        Ke3Xk:
        goto YDRpR;
        VOJKl:
        $data = pdo_get("ymktv_sun_gift_order", array("uniacid" => $_W["uniacid"], "pid" => $pid, "uid" => $openid));
        goto GiY1i;
        wWRje:
        echo json_encode($res);
        goto aEcgG;
        GiY1i:
        if ($data) {
            goto Ke3Xk;
        }
        goto ISJqv;
        YDRpR:
        $res = 0;
        goto stsBc;
        riwSx:
        $openid = $_GPC["openid"];
        goto JUP8B;
        ISJqv:
        $res = 1;
        goto fiedz;
        stsBc:
        z2OGr:
        goto wWRje;
        aEcgG:
    }
    public function doPageActiveing()
    {
        goto QOmYM;
        Gy0VA:
        goto TaSiY;
        goto rtuCB;
        rtuCB:
        prFnw:
        goto dV2XN;
        QOmYM:
        global $_GPC, $_W;
        goto KNk3k;
        V2iG3:
        $dbid = explode(",", $data["build_id"]);
        goto oSXDZ;
        KNk3k:
        $id = $_GPC["id"];
        goto aaCQ4;
        aaCQ4:
        $bid = $_GPC["bid"];
        goto CQIYK;
        uuxR9:
        $bdata = pdo_get("ymktv_sun_building", array("uniacid" => $_W["uniacid"], "id" => $bid));
        goto r6BQu;
        uaeOY:
        TaSiY:
        goto rJX22;
        r6BQu:
        if (!$data["build_id"]) {
            goto cNfhk;
        }
        goto V2iG3;
        CQIYK:
        $data = pdo_get("ymktv_sun_goods", array("uniacid" => $_W["uniacid"], "id" => $id));
        goto uuxR9;
        oSXDZ:
        cNfhk:
        goto q1EZ3;
        dV2XN:
        echo 2;
        goto uaeOY;
        pkBfA:
        echo 1;
        goto Gy0VA;
        q1EZ3:
        if ($data && $bdata && in_array($bid, $dbid)) {
            goto prFnw;
        }
        goto pkBfA;
        rJX22:
    }
    public function doPageJsActiveing()
    {
        goto cbYAl;
        vacDV:
        $bid = $_GPC["bid"];
        goto c54U5;
        FZK7u:
        $dbid = explode(",", $data["build_id"]);
        goto oTRCd;
        TEieC:
        if (!$data["build_id"]) {
            goto AGp74;
        }
        goto FZK7u;
        HMLTO:
        echo 1;
        goto airPv;
        Oa2d4:
        $id = $_GPC["id"];
        goto vacDV;
        oTRCd:
        AGp74:
        goto wS78o;
        BP3Fx:
        echo 2;
        goto tyW0J;
        airPv:
        goto JTnlZ;
        goto sl4D7;
        sl4D7:
        by1_O:
        goto BP3Fx;
        tyW0J:
        JTnlZ:
        goto kOpEA;
        c54U5:
        $data = pdo_get("ymktv_sun_drinks", array("uniacid" => $_W["uniacid"], "id" => $id));
        goto gyYJC;
        wS78o:
        if ($data && $bdata && in_array($bid, $dbid)) {
            goto by1_O;
        }
        goto HMLTO;
        gyYJC:
        $bdata = pdo_get("ymktv_sun_building", array("uniacid" => $_W["uniacid"], "id" => $bid));
        goto TEieC;
        cbYAl:
        global $_GPC, $_W;
        goto Oa2d4;
        kOpEA:
    }
    public function doPagejkActiveing()
    {
        goto bsJY5;
        Aqnj7:
        hayte:
        goto qj3bc;
        Bhj1S:
        $bid = $_GPC["bid"];
        goto caA_C;
        ecKU5:
        $res = 1;
        goto bGCuC;
        HUdlY:
        KuV25:
        goto glYPT;
        A4E2R:
        $res = 2;
        goto Ja_IK;
        bsJY5:
        global $_GPC, $_W;
        goto Zn6V3;
        zSJC7:
        goto hIpcE;
        goto vMWYV;
        khyP1:
        if ($now > $starttime) {
            goto hayte;
        }
        goto A4E2R;
        Ja_IK:
        goto GtvfE;
        glYPT:
        JRrzK:
        goto pjCiK;
        XQyVV:
        goto KKVWu;
        J0fS7:
        $bdata = pdo_get("ymktv_sun_building", array("uniacid" => $_W["uniacid"], "id" => $bid));
        goto dA3cT;
        fv1E5:
        $res = 0;
        goto XQyVV;
        EP39V:
        $starttime = strtotime($data["astime"]);
        goto Y1hk_;
        GtvfE:
        goto KuV25;
        goto Aqnj7;
        Zn6V3:
        $id = $_GPC["id"];
        goto Bhj1S;
        b8fSL:
        goto JRrzK;
        goto kq3aw;
        Y1hk_:
        $endtime = strtotime($data["antime"]);
        goto Iq5JX;
        zNo5F:
        $now = time();
        goto EP39V;
        kq3aw:
        cZY6I:
        goto khyP1;
        bGCuC:
        goto zSJC7;
        R5cE9:
        $dbid = explode(",", $data["build_id"]);
        goto JnYxh;
        NQHmK:
        goto b8fSL;
        qj3bc:
        if ($now < $endtime) {
            goto yuCvg;
        }
        goto ecKU5;
        dA3cT:
        if (!$data["build_id"]) {
            goto Q5gSl;
        }
        goto R5cE9;
        caA_C:
        $data = pdo_get("ymktv_sun_active", array("uniacid" => $_W["uniacid"], "id" => $id));
        goto J0fS7;
        vMWYV:
        yuCvg:
        goto fv1E5;
        pjCiK:
        echo json_encode($res);
        goto z3spj;
        Iq5JX:
        if ($data && $bdata && in_array($bid, $dbid)) {
            goto cZY6I;
        }
        goto motqM;
        KKVWu:
        hIpcE:
        goto HUdlY;
        motqM:
        $res = 1;
        goto NQHmK;
        JnYxh:
        Q5gSl:
        goto zNo5F;
        z3spj:
    }
    public function doPageadminlogin()
    {
        goto qmCQN;
        MCwyj:
        $res = array("re" => 0);
        goto C18FA;
        gRmhu:
        $account = $_GPC["account"];
        goto aZUfk;
        TfPHL:
        goto EvGJn;
        goto KtD5R;
        CSeoQ:
        goto EvGJn;
        goto Z78ZJ;
        DeTXk:
        Wd46F:
        goto CSeoQ;
        Hs6BM:
        if ($admin) {
            goto PG3dK;
        }
        goto t4cw4;
        aZUfk:
        $password = $_GPC["password"];
        goto pF4uw;
        pF4uw:
        $admin = pdo_get("ymktv_sun_business_account", array("uniacid" => $_W["uniacid"], "account" => $account, "password" => $password));
        goto vO0kG;
        Z78ZJ:
        PG3dK:
        goto tNqOb;
        t4cw4:
        if ($branch) {
            goto DjI1n;
        }
        goto oSN6l;
        UR5JJ:
        J7hpx:
        goto clD5Y;
        C18FA:
        goto Wd46F;
        goto UR5JJ;
        oSN6l:
        $user = pdo_get("ymktv_sun_servies", array("uniacid" => $_W["uniacid"], "login" => $account, "password" => $password));
        goto K3rPB;
        zifVj:
        EvGJn:
        goto v2jdI;
        K3rPB:
        if ($user) {
            goto J7hpx;
        }
        goto MCwyj;
        v2jdI:
        echo json_encode($res);
        goto VsNbN;
        qmCQN:
        global $_W, $_GPC;
        goto gRmhu;
        KtD5R:
        DjI1n:
        goto wc1GS;
        clD5Y:
        $res = array("re" => 2, "sid" => $user["sid"]);
        goto DeTXk;
        wc1GS:
        $res = array("re" => 3, "bid" => $branch["b_id"], "b_name" => pdo_getcolumn("ymktv_sun_building", array("uniacid" => $_W["uniacid"], "id" => $branch["b_id"]), "b_name"));
        goto zifVj;
        tNqOb:
        $res = array("re" => 1);
        goto TfPHL;
        vO0kG:
        $branch = pdo_get("ymktv_sun_branchhead", array("uniacid" => $_W["uniacid"], "account" => $account, "password" => $password));
        goto Hs6BM;
        VsNbN:
    }
    public function doPageRDuserData()
    {
        goto zB1pC;
        bvV4V:
        foreach ($roomorder as $k => $v) {
            goto IcH1E;
            IcH1E:
            $roomorder[$k]["user_id"] = $v["openid"];
            goto jkziW;
            q7I7n:
            $roomorder[$k]["good_num"] = 1;
            goto kkHNC;
            wskRs:
            $roomorder[$k]["money"] = $v["goods_price"];
            goto h1rT6;
            nphZS:
            Uu30h:
            goto eYMp_;
            afuCC:
            $roomorder[$k]["good_name"] = $v["goods_name"];
            goto sadm3;
            sadm3:
            $roomorder[$k]["good_imgs"] = $v["big_thumbnail"];
            goto q7I7n;
            jkziW:
            $roomorder[$k]["timeData"] = $v["timeData"] . '' . $v["times"];
            goto afuCC;
            h1rT6:
            $roomorder[$k]["tel"] = $v["mobile"];
            goto nphZS;
            kkHNC:
            $roomorder[$k]["biaoshi"] = 1;
            goto mr9T7;
            mr9T7:
            $roomorder[$k]["pay_time"] = date("Y-m-d H:i:s", $v["time"]);
            goto wskRs;
            eYMp_:
        }
        goto JzJCj;
        S3ufL:
        uIS8E:
        goto x3g9v;
        zB1pC:
        global $_W, $_GPC;
        goto Lp4Qk;
        cY2uK:
        T5kpl:
        goto BXhZZ;
        ZmqmH:
        Fyu6s:
        goto q_kN9;
        Lp4Qk:
        $sid = $_GPC["sid"];
        goto U3qUB;
        RFdVe:
        foreach ($order as $user) {
            $datetime[] = $user["pay_time"];
            bBYuY:
        }
        goto ZmqmH;
        aE8j4:
        $order = array_merge($roomorder, $drinkorder);
        goto PBHPO;
        U3qUB:
        $drinkorder = pdo_getall("ymktv_sun_order", array("uniacid" => $_W["uniacid"], "sid" => $sid, "status" => 0));
        goto rLloj;
        BXhZZ:
        echo json_encode($order);
        goto gkHsg;
        PBHPO:
        foreach ($order as $key => $v) {
            $order[$key]["pay_time"] = date("YmdHis", strtotime($v["pay_time"]));
            AKXFg:
        }
        goto S3ufL;
        rLloj:
        $sql = " SELECT * FROM " . tablename("ymktv_sun_goods") . " g " . " JOIN " . tablename("ymktv_sun_roomorder") . " ro " . " ON " . " g.id=ro.gid" . " WHERE " . " ro.uniacid=" . $_W["uniacid"] . " AND " . " ro.sid=" . $sid . " AND " . " ro.status=0";
        goto MvJst;
        JzJCj:
        WuJsX:
        goto aE8j4;
        x3g9v:
        $datetime = array();
        goto RFdVe;
        i03Sd:
        foreach ($order as $k => $v) {
            goto nAkXn;
            Rh_sv:
            lvYCF:
            goto Gy4D_;
            nAkXn:
            $order[$k]["pay_time"] = date("Y-m-d H:i:s", strtotime($v["pay_time"]));
            goto rXTmj;
            rXTmj:
            $order[$k]["good_imgs"] = explode(",", $v["good_imgs"]);
            goto Rh_sv;
            Gy4D_:
        }
        goto cY2uK;
        q_kN9:
        array_multisort($datetime, SORT_DESC, $order);
        goto i03Sd;
        MvJst:
        $roomorder = pdo_fetchall($sql);
        goto bvV4V;
        gkHsg:
    }
    public function doPageRDuserDataO()
    {
        goto mAVML;
        sPZ0Z:
        foreach ($order as $user) {
            $datetime[] = $user["pay_time"];
            VjQiv:
        }
        goto MbKNq;
        O8vJ7:
        foreach ($roomorder as $k => $v) {
            goto BH0vs;
            JtNzc:
            $roomorder[$k]["pay_time"] = date("Y-m-d H:i:s", $v["time"]);
            goto YCc2e;
            BH0vs:
            $roomorder[$k]["user_id"] = $v["openid"];
            goto W0g6l;
            N3jKE:
            y_75F:
            goto ojdB1;
            Kds3K:
            $roomorder[$k]["good_num"] = 1;
            goto uLaL6;
            uLaL6:
            $roomorder[$k]["biaoshi"] = 1;
            goto JtNzc;
            vczqH:
            $roomorder[$k]["tel"] = $v["mobile"];
            goto N3jKE;
            YCc2e:
            $roomorder[$k]["money"] = $v["goods_price"];
            goto vczqH;
            TbC07:
            $roomorder[$k]["good_imgs"] = $v["big_thumbnail"];
            goto Kds3K;
            zl0Lc:
            $roomorder[$k]["good_name"] = $v["goods_name"];
            goto TbC07;
            W0g6l:
            $roomorder[$k]["timeData"] = $v["timeData"] . '' . $v["times"];
            goto zl0Lc;
            ojdB1:
        }
        goto hEKFT;
        mHRJu:
        foreach ($order as $key => $v) {
            $order[$key]["pay_time"] = date("YmdHis", strtotime($v["pay_time"]));
            U9lwC:
        }
        goto ZIBCN;
        TIoKH:
        array_multisort($datetime, SORT_DESC, $order);
        goto Dy0J5;
        sUCWD:
        $order = array_merge($roomorder, $drinkorder);
        goto mHRJu;
        mAVML:
        global $_W, $_GPC;
        goto QZ7v8;
        pLu9u:
        $roomorder = pdo_fetchall($sql);
        goto O8vJ7;
        ZIBCN:
        GfJii:
        goto xP9or;
        dMSS3:
        qXqn_:
        goto hNkRe;
        plO73:
        $sql = " SELECT * FROM " . tablename("ymktv_sun_goods") . " g " . " JOIN " . tablename("ymktv_sun_roomorder") . " ro " . " ON " . " g.id=ro.gid" . " WHERE " . " ro.uniacid=" . $_W["uniacid"] . " AND " . " ro.sid=" . $sid . " AND " . " ro.status=1";
        goto pLu9u;
        QZ7v8:
        $sid = $_GPC["sid"];
        goto fsauF;
        hNkRe:
        echo json_encode($order);
        goto HuN3H;
        Dy0J5:
        foreach ($order as $k => $v) {
            goto hUtRI;
            hUtRI:
            $order[$k]["pay_time"] = date("Y-m-d H:i:s", strtotime($v["pay_time"]));
            goto I2tpS;
            RBmFQ:
            tOy63:
            goto wddWE;
            I2tpS:
            $order[$k]["good_imgs"] = explode(",", $v["good_imgs"]);
            goto RBmFQ;
            wddWE:
        }
        goto dMSS3;
        xP9or:
        $datetime = array();
        goto sPZ0Z;
        hEKFT:
        k6Ugr:
        goto sUCWD;
        MbKNq:
        ya27X:
        goto TIoKH;
        fsauF:
        $drinkorder = pdo_getall("ymktv_sun_order", array("uniacid" => $_W["uniacid"], "sid" => $sid, "status" => 1));
        goto plO73;
        HuN3H:
    }
    public function doPageallData()
    {
        goto gPz_n;
        ugooH:
        $drinkorder = pdo_getall("ymktv_sun_order", array("uniacid" => $_W["uniacid"], "sid" => $sid));
        goto ZSFIO;
        gPz_n:
        global $_W, $_GPC;
        goto Bxq1c;
        b5Eiq:
        $order = array_merge($roomorder, $drinkorder);
        goto RtHmC;
        zQ8bu:
        $ordernum = $drinknum + $roomnum;
        goto ugooH;
        ELCPG:
        $allnum = sizeof($order);
        goto dAHo2;
        OhF_y:
        echo json_encode($data);
        goto t3DI4;
        ZSFIO:
        $roomorder = pdo_getall("ymktv_sun_roomorder", array("uniacid" => $_W["uniacid"], "sid" => $sid));
        goto O3BMk;
        qY93j:
        Gu_xF:
        goto d0sgw;
        qMqMJ:
        toRPo:
        goto b5Eiq;
        fiwLf:
        foreach ($order as $k => $v) {
            goto CC3LL;
            X0okK:
            $neworder[] = $v;
            goto szjnK;
            CC3LL:
            if (!(date("Y-m-d", time()) == date("Y-m-d", strtotime($v["pay_time"])))) {
                goto k6LNe;
            }
            goto X0okK;
            szjnK:
            k6LNe:
            goto s69pS;
            s69pS:
            EXZZj:
            goto zX2s1;
            zX2s1:
        }
        goto qY93j;
        Bxq1c:
        $sid = $_GPC["sid"];
        goto K9bhe;
        d0sgw:
        $todaynum = sizeof($neworder);
        goto ELCPG;
        O3BMk:
        foreach ($roomorder as $k => $v) {
            $roomorder[$k]["pay_time"] = date("Y-m-d H:i:s", $v["time"]);
            lhQUv:
        }
        goto qMqMJ;
        K9bhe:
        $drinknum = sizeof(pdo_getall("ymktv_sun_order", array("uniacid" => $_W["uniacid"], "sid" => $sid, "status" => 0)));
        goto Ip7L0;
        ts6Lv:
        $data = array("todaynum" => $todaynum, "allnum" => $allnum, "ordernum" => $ordernum, "endnum" => $endnum);
        goto OhF_y;
        dAHo2:
        $endnum = $allnum - $ordernum;
        goto ts6Lv;
        Ip7L0:
        $roomnum = sizeof(pdo_getall("ymktv_sun_roomorder", array("uniacid" => $_W["uniacid"], "sid" => $sid, "status" => 0)));
        goto zQ8bu;
        RtHmC:
        $neworder = array();
        goto fiwLf;
        t3DI4:
    }
    public function doPageUserdance()
    {
        goto KhzrB;
        wugkI:
        echo json_encode($newData);
        goto hf3_7;
        fWPoU:
        $data = pdo_fetchall($sql);
        goto TMfBy;
        TMfBy:
        $newData = array();
        goto jKDIX;
        iz9b5:
        NUHh2:
        goto wugkI;
        KhzrB:
        global $_GPC, $_W;
        goto HGD8H;
        jKDIX:
        foreach ($data as $k => $v) {
            goto COuDW;
            IuFtD:
            EJ8ND:
            goto hOUOo;
            jxeZd:
            goto wXp0_;
            goto NaHxr;
            CtLyi:
            array_push($newData, $v);
            goto d0LGI;
            VWghK:
            $v["imglen"] = sizeof($v["imgs"]);
            goto L5Kig;
            ttqP3:
            $v["isfollow"] = 1;
            goto bBiQz;
            lx5I4:
            goto clw3R;
            goto NzNac;
            COuDW:
            $v["imgs"] = explode(",", $v["imgs"]);
            goto VWghK;
            hOUOo:
            $v["iszan"] = 1;
            goto hYOUF;
            XZbP6:
            $v["iszan"] = 0;
            goto xy99G;
            BMinM:
            $v["zanlen"] = sizeof(pdo_getall("ymktv_sun_zan", array("uniacid" => $_W["uniacid"], "expert_id" => $v["id"])));
            goto D0CEe;
            D0CEe:
            $res = pdo_get("ymktv_sun_zan", array("uniacid" => $_W["uniacid"], "expert_id" => $v["id"], "user_id" => $openid));
            goto BvWy1;
            NaHxr:
            eA7FM:
            goto LoEDy;
            LoEDy:
            $v["benren"] = 1;
            goto jhYu7;
            BvWy1:
            $re = pdo_get("ymktv_sun_attention", array("uniacid" => $_W["uniacid"], "attention_id" => $v["user_id"], "fans_id" => $openid));
            goto ELiZm;
            L5Kig:
            $v["is_shopen"] = pdo_getcolumn("ymktv_sun_tab", array("uniacid" => $_W["uniacid"]), "is_shopen");
            goto BMinM;
            bBiQz:
            clw3R:
            goto unoQh;
            jhYu7:
            wXp0_:
            goto bJQeE;
            unoQh:
            if ($v["user_id"] == $openid) {
                goto eA7FM;
            }
            goto Zgukl;
            bJQeE:
            if ($res) {
                goto EJ8ND;
            }
            goto XZbP6;
            xy99G:
            goto pbX2M;
            goto IuFtD;
            ELiZm:
            if ($re) {
                goto Ug19R;
            }
            goto Rgft5;
            Rgft5:
            $v["isfollow"] = 0;
            goto lx5I4;
            hYOUF:
            pbX2M:
            goto CtLyi;
            d0LGI:
            xvy3D:
            goto ubGaj;
            NzNac:
            Ug19R:
            goto ttqP3;
            Zgukl:
            $v["benren"] = 0;
            goto jxeZd;
            ubGaj:
        }
        goto iz9b5;
        HGD8H:
        $openid = $_GPC["openid"];
        goto aWtQM;
        aWtQM:
        $sql = " SELECT * FROM " . tablename("ymktv_sun_user") . " u " . " JOIN " . tablename("ymktv_sun_expert") . " e " . " ON " . " e.user_id=u.openid" . " WHERE " . " e.uniacid=" . $_W["uniacid"] . " AND " . " u.uniacid=" . $_W["uniacid"] . " AND " . " e.user_id=" . "'{$openid}'" . " AND" . " isshow=1 " . " ORDER BY release_time DESC";
        goto fWPoU;
        hf3_7:
    }
    public function doPageiskanzhu()
    {
        goto QZ5Tw;
        tLbQv:
        $uid = $_GPC["uid"];
        goto N3BE4;
        oUvZV:
        $res = 1;
        goto rabme;
        rabme:
        uVVAh:
        goto efQv_;
        L9WDG:
        goto uVVAh;
        goto FM87i;
        FM87i:
        qCp8N:
        goto oUvZV;
        QZ5Tw:
        global $_W, $_GPC;
        goto tLbQv;
        efQv_:
        echo json_encode($res);
        goto yHsK_;
        ci84c:
        $data = pdo_get("ymktv_sun_user_bargain", array("uniacid" => $_W["uniacid"], "gid" => $id, "openid" => $uid, "mch_id" => 0));
        goto erHVc;
        N3BE4:
        $id = $_GPC["id"];
        goto ci84c;
        jqT3m:
        $res = 0;
        goto L9WDG;
        erHVc:
        if ($data) {
            goto qCp8N;
        }
        goto jqT3m;
        yHsK_:
    }
    public function doPagejkActiveStatus()
    {
        goto Afb79;
        i6WOt:
        $data = pdo_get("ymktv_sun_active", array("uniacid" => $_W["uniacid"], "id" => $id, "showindex" => 1));
        goto kw3Wl;
        KOgVU:
        yU58D:
        goto psx0L;
        mrIJn:
        $id = $_GPC["id"];
        goto i6WOt;
        psx0L:
        x6RHY:
        goto EO42n;
        mkMCv:
        is2qN:
        goto Mf8L3;
        yDWzY:
        goto x6RHY;
        goto bpPv7;
        pdhpX:
        $res = 0;
        goto yDWzY;
        EO42n:
        echo json_encode($res);
        goto GxHgt;
        Afb79:
        global $_GPC, $_W;
        goto mrIJn;
        yxux4:
        $res = 2;
        goto re6Ue;
        sAKdF:
        if ($data["antime"] > date("Y-m-d H:i:s", time())) {
            goto is2qN;
        }
        goto yxux4;
        bpPv7:
        Xwb9_:
        goto sAKdF;
        kw3Wl:
        if (date("Y-m-d H:i:s", time()) > $data["astime"]) {
            goto Xwb9_;
        }
        goto pdhpX;
        Mf8L3:
        $res = 1;
        goto KOgVU;
        re6Ue:
        goto yU58D;
        goto mkMCv;
        GxHgt:
    }
    public function doPagekjActiveStatus()
    {
        goto Hluco;
        V3h3M:
        $data = pdo_get("ymktv_sun_new_bargain", array("uniacid" => $_W["uniacid"], "id" => $id, "status" => 2));
        goto oYD53;
        ESAye:
        ItL0L:
        goto pI_sK;
        ku4mD:
        wZZ9q:
        goto fsYZl;
        TrgkX:
        $res = 2;
        goto sY0uE;
        UYJhm:
        goto qtCT7;
        goto ESAye;
        Hluco:
        global $_GPC, $_W;
        goto AviZN;
        sY0uE:
        goto UYJhm;
        pI_sK:
        $res = 1;
        goto UVfin;
        AviZN:
        $id = $_GPC["id"];
        goto V3h3M;
        oYD53:
        if (date("Y-m-d H:i:s", time()) > $data["starttime"]) {
            goto Fbb_6;
        }
        goto fjeyc;
        AIPl1:
        if ($data["endtime"] > date("Y-m-d H:i:s", time())) {
            goto ItL0L;
        }
        goto TrgkX;
        pullH:
        goto vRt2v;
        U5O2C:
        Fbb_6:
        goto AIPl1;
        df6Px:
        qtCT7:
        goto ku4mD;
        vRt2v:
        goto wZZ9q;
        goto U5O2C;
        fjeyc:
        $res = 0;
        goto pullH;
        UVfin:
        goto df6Px;
        fsYZl:
        echo json_encode($res);
        goto l8aVJ;
        l8aVJ:
    }
    public function doPagekjActiveStatus2()
    {
        goto Zh90b;
        T8i6r:
        $res = 1;
        goto BH6Po;
        Zh90b:
        global $_GPC, $_W;
        goto JpFMm;
        evaOJ:
        echo json_encode($res);
        goto m3KID;
        TOOC4:
        $res = 2;
        goto pwgLi;
        AECN5:
        mxU4Q:
        goto f8Gw_;
        Bf0j4:
        JfZF_:
        goto T8i6r;
        BH6Po:
        goto AECN5;
        O1ddf:
        $bdata = pdo_get("ymktv_sun_building", array("uniacid" => $_W["uniacid"], "id" => $bid));
        goto JcgVv;
        QKiau:
        goto mqc9E;
        SxZZd:
        WISE6:
        goto evaOJ;
        pwgLi:
        goto kV0VC;
        PLiLA:
        goto WISE6;
        goto o9HZG;
        dmSsa:
        if (date("Y-m-d H:i:s", time()) > $data["starttime"]) {
            goto SNki0;
        }
        goto kBo7M;
        hAT1d:
        $data = pdo_get("ymktv_sun_new_bargain", array("uniacid" => $_W["uniacid"], "id" => $id, "status" => 2));
        goto O1ddf;
        b8CYz:
        SNki0:
        goto cta2w;
        JpFMm:
        $id = $_GPC["id"];
        goto Mcjmz;
        kBo7M:
        $res = 0;
        goto QKiau;
        o9HZG:
        Q8vZj:
        goto dmSsa;
        mqc9E:
        goto NW8MN;
        goto b8CYz;
        cta2w:
        if ($data["endtime"] > date("Y-m-d H:i:s", time())) {
            goto JfZF_;
        }
        goto TOOC4;
        f8Gw_:
        NW8MN:
        goto SxZZd;
        kV0VC:
        goto mxU4Q;
        goto Bf0j4;
        dtzd2:
        $res = 2;
        goto PLiLA;
        Mcjmz:
        $bid = $_GPC["bid"];
        goto hAT1d;
        JcgVv:
        if ($data && $bdata) {
            goto Q8vZj;
        }
        goto dtzd2;
        m3KID:
    }
    public function doPageindexTan()
    {
        goto WBfHD;
        WBfHD:
        global $_W;
        goto OBVF0;
        OBVF0:
        $data = pdo_get("ymktv_sun_winindex", array("uniacid" => $_W["uniacid"]));
        goto aDzB3;
        aDzB3:
        echo json_encode($data);
        goto SdO4O;
        SdO4O:
    }


    public function doPageindexTan2()
    {
        global $_W;
        $data = pdo_get("ymktv_sun_winindex", array("uniacid" => $_W["uniacid"]));
        echo json_encode($data);
    }

    public function doPagedeldance()
    {
        goto cmmo_;
        cmmo_:
        global $_GPC, $_W;
        goto DKEJ3;
        TAUbJ:
        $res = pdo_delete("ymktv_sun_expert", array("uniacid" => $_W["uniacid"], "id" => $id, "user_id" => $openid));
        goto PK6s7;
        EnPWD:
        $openid = $_GPC["openid"];
        goto TAUbJ;
        tNbi0:
        echo json_encode($res);
        goto i66yH;
        LjOHe:
        PkMlD:
        goto tNbi0;
        PK6s7:
        if (!$res) {
            goto PkMlD;
        }
        goto hVOgH;
        DKEJ3:
        $id = $_GPC["id"];
        goto EnPWD;
        hVOgH:
        pdo_delete("ymktv_sun_expert_comment", array("uniacid" => $_W["uniacid"], "expert_id" => $id));
        goto LjOHe;
        i66yH:
    }
    public function doPageRefreshCard()
    {
        goto XoggD;
        INQvl:
        pdo_update("ymktv_sun_vipopen", array("isopen" => 0), array("uniacid" => $_W["uniacid"], "openid" => $openid));
        goto GeDID;
        pgfER:
        if (!(time() > $vip["end_time"])) {
            goto O_D6W;
        }
        goto INQvl;
        OG3Hr:
        foreach ($active as $k => $v) {
            goto J5wAy;
            TPe8q:
            Y0djj:
            goto KGAtw;
            VrYDP:
            echo json_encode(111);
            goto TPe8q;
            GpVZ2:
            pdo_update("ymktv_sun_user_active", array("sharenum" => $v["sharenum"], "pan_time" => time()), array("uniacid" => $_W["uniacid"], "active_id" => $v["id"], "uid" => $openid));
            goto VrYDP;
            KGAtw:
            ForZx:
            goto QWDsS;
            J5wAy:
            $data = pdo_get("ymktv_sun_user_active", array("uniacid" => $_W["uniacid"], "active_id" => $v["id"], "uid" => $openid));
            goto zb5Ti;
            zb5Ti:
            if (!(date("Y-m-d", $data["pan_time"]) != date("Y-m-d", time()))) {
                goto Y0djj;
            }
            goto GpVZ2;
            QWDsS:
        }
        goto o5v41;
        pKlRl:
        $vip = pdo_get("ymktv_sun_vipopen", array("uniacid" => $_W["uniacid"], "openid" => $openid));
        goto pgfER;
        XoggD:
        global $_W, $_GPC;
        goto MPhte;
        MPhte:
        $openid = $_GPC["openid"];
        goto VNLZ9;
        o5v41:
        WQygf:
        goto pKlRl;
        VNLZ9:
        $active = pdo_getall("ymktv_sun_active", array("uniacid" => $_W["uniacid"]));
        goto OG3Hr;
        GeDID:
        O_D6W:
        goto TrnM6;
        TrnM6:
    }
    public function doPagebuilding()
    {
        goto vLpjC;
        FUrJA:
        $lat = $_GPC["lat"];
        goto IEWVc;
        QD5Ko:
        foreach ($build as $k => $v) {
            $build[$k]["distance"] = round($this->getdistance($lat, $lon, $v["lat"], $v["lon"]) / 1000, 2);
            K4Qmk:
        }
        goto v11Q2;
        vqb8X:
        pBjfx:
        goto QD5Ko;
        edxbM:
        foreach ($build as $k => $v) {
            goto tsYLE;
            tsYLE:
            $build[$k]["lon"] = (float) explode(",", $v["longitude"])[0];
            goto BqQtq;
            BqQtq:
            $build[$k]["lat"] = (float) explode(",", $v["longitude"])[1];
            goto KXX59;
            KXX59:
            Kk8lc:
            goto bwhGf;
            bwhGf:
        }
        goto vqb8X;
        O75Vl:
        Bvp8j:
        goto S9khM;
        vLpjC:
        global $_W, $_GPC;
        goto Kg3D5;
        ATuGY:
        foreach ($build as $k => $v) {
            $dis[$k] = $v["distance"];
            NoaCu:
        }
        goto O75Vl;
        Kg3D5:
        $lon = $_GPC["lon"];
        goto FUrJA;
        Mh3Ty:
        echo json_encode($build);
        goto mhSeh;
        S9khM:
        array_multisort($dis, SORT_ASC, $build);
        goto Mh3Ty;
        IEWVc:
        $build = pdo_getall("ymktv_sun_building", array("uniacid" => $_W["uniacid"]));
        goto edxbM;
        v11Q2:
        gam0P:
        goto ATuGY;
        mhSeh:
    }
    function getdistance($lng1, $lat1, $lng2, $lat2)
    {
        goto xNm0Y;
        piMEK:
        return $s;
        goto qJTOh;
        xNm0Y:
        $radLat1 = deg2rad($lat1);
        goto C7F8d;
        p6fUE:
        $b = $radLng1 - $radLng2;
        goto a_pXA;
        GDYsi:
        $a = $radLat1 - $radLat2;
        goto p6fUE;
        S9Yij:
        $radLng1 = deg2rad($lng1);
        goto j_Z2n;
        j_Z2n:
        $radLng2 = deg2rad($lng2);
        goto GDYsi;
        a_pXA:
        $s = 2 * asin(sqrt(pow(sin($a / 2), 2) + cos($radLat1) * cos($radLat2) * pow(sin($b / 2), 2))) * 6378.137 * 1000;
        goto piMEK;
        C7F8d:
        $radLat2 = deg2rad($lat2);
        goto S9Yij;
        qJTOh:
    }
    public function doPagebuildDetail()
    {
        goto SwomC;
        Zak40:
        $data["lon"] = (float) explode(",", $data["longitude"])[0];
        goto wR7mV;
        q81TS:
        $data = pdo_get("ymktv_sun_building", array("uniacid" => $_W["uniacid"], "id" => $id));
        goto Zak40;
        NbYfh:
        echo json_encode($data);
        goto FFfgK;
        SwomC:
        global $_W, $_GPC;
        goto hiaIk;
        wR7mV:
        $data["lat"] = (float) explode(",", $data["longitude"])[1];
        goto NbYfh;
        hiaIk:
        $id = $_GPC["id"];
        goto q81TS;
        FFfgK:
    }
    public function doPageRoomAndFood()
    {
        goto w3pIR;
        iHPmu:
        Fj1mV:
        goto ZQpdi;
        a1YZe:
        $newData = array();
        goto le8mx;
        RFhoX:
        $goods = pdo_getall("ymktv_sun_goods", array("uniacid" => $_W["uniacid"]), '', '', "time DESC");
        goto OkeoM;
        OkeoM:
        $data = array();
        goto NoqEI;
        hJFgl:
        echo json_encode($newData);
        goto o4WOO;
        WLgkR:
        U4DtH:
        goto HYgZH;
        cnPYA:
        foreach ($drinks as $k => $v) {
            goto zA17m;
            BKIwm:
            ksyT_:
            goto DBgf5;
            Vc9dN:
            $data["drinks"][] = $v;
            goto om952;
            zA17m:
            if (!in_array($id, explode(",", $v["build_id"]))) {
                goto tQA4w;
            }
            goto Vc9dN;
            om952:
            tQA4w:
            goto BKIwm;
            DBgf5:
        }
        goto tVdLh;
        qiPKk:
        $id = $_GPC["id"];
        goto RFhoX;
        CCmMs:
        N8ZdX:
        goto hJFgl;
        w3pIR:
        global $_W, $_GPC;
        goto qiPKk;
        le8mx:
        foreach ($data["goods"] as $k => $v) {
            goto Pk7rr;
            Pk7rr:
            $newData["goods"][$k]["id"] = $v["id"];
            goto YibTV;
            bpx1l:
            tneAE:
            goto mhcPr;
            rwmn3:
            $newData["goods"][$k]["goods_name"] = $v["goods_name"];
            goto RhEeO;
            RhEeO:
            $newData["goods"][$k]["goods_price"] = $v["goods_price"];
            goto bVLTi;
            YibTV:
            $newData["goods"][$k]["thumbnail"] = $v["thumbnail"];
            goto rwmn3;
            bVLTi:
            $newData["goods"][$k]["goods_cost"] = $v["goods_cost"];
            goto bpx1l;
            mhcPr:
        }
        goto WLgkR;
        tVdLh:
        ZFXOA:
        goto a1YZe;
        ZQpdi:
        $drinks = pdo_getall("ymktv_sun_drinks", array("uniacid" => $_W["uniacid"]), '', '', "d_time DESC");
        goto cnPYA;
        HYgZH:
        foreach ($data["drinks"] as $k => $v) {
            goto yvcQv;
            WUlMu:
            rsZdC:
            goto ur2If;
            Ufct0:
            $newData["drinks"][$k]["z_imgs"] = $v["z_imgs"];
            goto f0v4P;
            l5biW:
            $newData["drinks"][$k]["drink_price"] = $v["drink_price"];
            goto f5DX7;
            f5DX7:
            $newData["drinks"][$k]["drink_cost"] = $v["drink_cost"];
            goto WUlMu;
            yvcQv:
            $newData["drinks"][$k]["id"] = $v["id"];
            goto Ufct0;
            f0v4P:
            $newData["drinks"][$k]["drink_name"] = $v["drink_name"];
            goto l5biW;
            ur2If:
        }
        goto CCmMs;
        NoqEI:
        foreach ($goods as $k => $v) {
            goto YCbFx;
            f6xUU:
            wZq4l:
            goto yWOp_;
            gihQr:
            Tcwsy:
            goto f6xUU;
            YCbFx:
            if (!in_array($id, explode(",", $v["build_id"]))) {
                goto Tcwsy;
            }
            goto dx8Jw;
            dx8Jw:
            $data["goods"][] = $v;
            goto gihQr;
            yWOp_:
        }
        goto iHPmu;
        o4WOO:
    }
    public function doPageFootData()
    {
        goto n3bLw;
        XiC1W:
        $newData["drink_name"] = $data["drink_name"];
        goto gnMCM;
        OUxgA:
        $newData["z_imgs"] = $data["z_imgs"];
        goto UnJQ9;
        g1Nc8:
        $newData["b_name"] = pdo_getcolumn("ymktv_sun_building", array("uniacid" => $_W["uniacid"], "id" => $bid), "b_name");
        goto Kn7ug;
        hEbvm:
        $bid = $_GPC["bid"];
        goto kntO6;
        gnMCM:
        $newData["drink_price"] = $data["drink_price"];
        goto OUxgA;
        UnJQ9:
        $newData["integral"] = pdo_getcolumn("ymktv_sun_system", array("uniacid" => $_W["uniacid"]), "integral") * $data["drink_price"];
        goto g1Nc8;
        C9WFM:
        $newData["id"] = $data["id"];
        goto XiC1W;
        MzA_z:
        $id = $_GPC["id"];
        goto hEbvm;
        kntO6:
        $data = pdo_get("ymktv_sun_drinks", array("uniacid" => $_W["uniacid"], "id" => $id));
        goto C9WFM;
        n3bLw:
        global $_W, $_GPC;
        goto MzA_z;
        Kn7ug:
        echo json_encode($newData);
        goto gXrPE;
        gXrPE:
    }
    public function doPageFootOrder()
    {
        goto zBQ8f;
        z1SVF:
        $tel = $_GPC["tel"];
        goto GQCgO;
        OTk7a:
        $oid = 0;
        goto QW2ye;
        GQCgO:
        $drink_name = $_GPC["drink_name"];
        goto kj3c7;
        Nt314:
        $sms = pdo_get("ymktv_sun_sms", array("uniacid" => $_W["uniacid"]));
        goto p2kYX;
        h_zk5:
        $print = pdo_get("ymktv_sun_printing", array("uniacid" => $_W["uniacid"]));
        goto NKiz0;
        yvaZ7:
        $bid = $_GPC["bid"];
        goto fHM0j;
        fIs6t:
        $room = $_GPC["room"];
        goto voPIW;
        SV1Q_:
        foreach ($good["build_id"] as $k => $v) {
            goto jy9vS;
            D1x4C:
            U2B8E:
            goto ILeBw;
            jy9vS:
            foreach ($good["sb_sid"] as $kk => $vv) {
                goto cKUlm;
                r5je0:
                Klv3R:
                goto QzzlX;
                r2_NI:
                $newGood[$v][] = $vv;
                goto r5je0;
                cKUlm:
                if (!($k == $kk)) {
                    goto Klv3R;
                }
                goto r2_NI;
                QzzlX:
                puWbY:
                goto h688z;
                h688z:
            }
            goto D1x4C;
            ILeBw:
            i5zTc:
            goto AOa_b;
            AOa_b:
        }
        goto wynr0;
        kGhme:
        $openid = $_GPC["openid"];
        goto ZAP5T;
        qTlic:
        if ($newGood[$bid]) {
            goto bdNIG;
        }
        goto OTk7a;
        YyTPB:
        pdo_update("ymktv_sun_user", array("money" => $integ), array("uniacid" => $_W["uniacid"], "openid" => $openid));
        goto Nt314;
        tqeWj:
        bdNIG:
        goto ia9vF;
        NKiz0:
        if (!($print["is_open"] == 1)) {
            goto GOLJ0;
        }
        goto NXBqM;
        NXBqM:
        $this->DrinkPrinting($oid, $bid);
        goto QHAS2;
        zBQ8f:
        global $_GPC, $_W;
        goto yvaZ7;
        kj3c7:
        $remark = $_GPC["remark"];
        goto fIs6t;
        p2kYX:
        $build = pdo_get("ymktv_sun_branchhead", array("uniacid" => $_W["uniacid"], "b_id" => $bid));
        goto VvzAY;
        hTXaN:
        $good["sb_sid"] = explode(",", $good["sb_sid"]);
        goto NAit6;
        QW2ye:
        goto O3iY2;
        goto tqeWj;
        BP_6A:
        Tj7mW:
        goto u33d4;
        Zr9g_:
        $data = array("address" => $room, "tel" => $tel, "good_money" => $price, "good_num" => 1, "good_imgs" => $img, "good_name" => $drink_name, "good_id" => $id, "user_id" => $openid, "money" => $price, "num" => 1, "uniacid" => $_W["uniacid"], "order_num" => date("YmdHis") . rand(1000, 9999), "pay_time" => date("Y-m-d H:i:s", time()), "status" => 0, "sid" => implode(",", $newGood[$bid]), "remark" => $remark, "build_id" => $bid);
        goto qTlic;
        ia9vF:
        $res = pdo_insert("ymktv_sun_order", $data);
        goto bstFI;
        XE3VT:
        $phone = [0 => $build["mobile"], 1 => $mobile];
        goto nBJ4z;
        PujMu:
        $userData = pdo_get("ymktv_sun_user", array("uniacid" => $_W["uniacid"], "openid" => $openid));
        goto r1Hmi;
        oYw_g:
        O3iY2:
        goto HnJYh;
        voPIW:
        $img = $_GPC["img"];
        goto rV3HH;
        ufXoy:
        $good["build_id"] = explode(",", $good["build_id"]);
        goto hTXaN;
        NAit6:
        $newGood = array();
        goto SV1Q_;
        wynr0:
        Ns_xg:
        goto Zr9g_;
        nBJ4z:
        if (!($sms["is_open"] == 1)) {
            goto QqpWQ;
        }
        goto cUyV1;
        rV3HH:
        $good = pdo_get("ymktv_sun_goods", array("uniacid" => $_W["uniacid"], "room_num" => $room));
        goto ufXoy;
        bstFI:
        $oid = pdo_insertid();
        goto TarLv;
        QHAS2:
        GOLJ0:
        goto H5nHd;
        ZAP5T:
        $price = $_GPC["price"];
        goto z1SVF;
        r1Hmi:
        $integ = $userData["money"] + $integral;
        goto YyTPB;
        VvzAY:
        $mobile = pdo_getcolumn("ymktv_sun_servies", array("uniacid" => $_W["uniacid"], "sid" => implode(",", $newGood[$bid])), "mobile");
        goto XE3VT;
        H5nHd:
        l7fKJ:
        goto oYw_g;
        cUyV1:
        foreach ($phone as $k => $v) {
            $this->Shortmessage($v);
            uAK52:
        }
        goto BP_6A;
        TarLv:
        if (!$res) {
            goto l7fKJ;
        }
        goto PujMu;
        fHM0j:
        $integral = $_GPC["integral"];
        goto UY4gi;
        HnJYh:
        echo json_encode($oid);
        goto zXJnm;
        u33d4:
        QqpWQ:
        goto h_zk5;
        UY4gi:
        $id = $_GPC["id"];
        goto kGhme;
        zXJnm:
    }
    public function doPagetodayorder()
    {
        goto W3Mnf;
        N3hFJ:
        LEOej:
        goto ZQ2ZM;
        kTlc6:
        $roomno = array();
        goto Yq8Zi;
        Yq8Zi:
        $roomyes = array();
        goto TyvJ8;
        TyvJ8:
        $roomsno = array();
        goto MPmXH;
        XFk_H:
        $todayorder = count($drinkno) + count($drinkyes) + count($roomno) + count($roomyes);
        goto BIEPF;
        q8w81:
        $orderNO = count($drinksno) + count($roomsno);
        goto X9u35;
        g3I8u:
        PoWVr:
        goto leu3L;
        HyJC1:
        $drinkno = array();
        goto gKplC;
        G9f1Z:
        $drinkorder = pdo_getall("ymktv_sun_order", array("uniacid" => $_W["uniacid"], "build_id" => $bid));
        goto HyJC1;
        APbgm:
        echo json_encode($newData);
        goto IpzWu;
        W3Mnf:
        global $_W, $_GPC;
        goto VQqPT;
        uHTai:
        $newData = array("todayorder" => $todayorder, "todayyes" => $todayyes, "todayfk" => count($todayfk), "orderno" => $orderNO, "orderyes" => $orderYes);
        goto APbgm;
        X9u35:
        $orderYes = count($drinksYes) + count($roomsYes);
        goto uHTai;
        leu3L:
        $roomorder = pdo_getall("ymktv_sun_roomorder", array("uniacid" => $_W["uniacid"], "build_id" => $bid));
        goto kTlc6;
        BIEPF:
        $todayyes = count($roomyes) + count($drinkyes);
        goto q8w81;
        ZQ2ZM:
        $todayfk = pdo_getall("ymktv_sun_user", array("uniacid" => $_W["uniacid"]));
        goto XFk_H;
        RGOIR:
        foreach ($roomorder as $k => $v) {
            goto ghC85;
            xFZ4O:
            $roomsno[] = $v;
            goto iw7Co;
            UutUq:
            $roomno[] = $v;
            goto h9jYj;
            h9jYj:
            mg9y8:
            goto xUZEp;
            ov105:
            MsX1r:
            goto UutUq;
            NVa5N:
            if ($v["status"] == 0) {
                goto MsX1r;
            }
            goto VFwhM;
            xUZEp:
            xqI04:
            goto hssYz;
            VFwhM:
            $roomyes[] = $v;
            goto VBba3;
            R5YIu:
            goto GVWN7;
            goto ESUE2;
            VBba3:
            goto mg9y8;
            goto ov105;
            ESUE2:
            XkM1z:
            goto xFZ4O;
            hssYz:
            if ($v["status"] == 0) {
                goto XkM1z;
            }
            goto I5lyq;
            I5lyq:
            $roomsYes[] = $v;
            goto R5YIu;
            ghC85:
            if (!(date("Y-m-d", time()) == date("Y-m-d", $v["time"]))) {
                goto xqI04;
            }
            goto NVa5N;
            iw7Co:
            GVWN7:
            goto pO1CT;
            pO1CT:
            xN0wF:
            goto heMgh;
            heMgh:
        }
        goto N3hFJ;
        FUm73:
        foreach ($drinkorder as $k => $v) {
            goto ul7Za;
            ul7Za:
            if (!(date("Y-m-d", time()) == date("Y-m-d", strtotime($v["pay_time"])))) {
                goto AjpGI;
            }
            goto Nnp3v;
            X05vj:
            $drinksno[] = $v;
            goto II9WE;
            RN9M8:
            $drinkno[] = $v;
            goto A5QqM;
            Nnp3v:
            if ($v["status"] == 0) {
                goto wevYe;
            }
            goto Y3Q40;
            II9WE:
            hebk_:
            goto gIk0z;
            y6frC:
            wevYe:
            goto RN9M8;
            mtm3H:
            goto hebk_;
            goto AvFKV;
            AvFKV:
            lfTdG:
            goto X05vj;
            WZV5T:
            $drinksYes[] = $v;
            goto mtm3H;
            A5QqM:
            RYrsw:
            goto hc7xE;
            hc7xE:
            AjpGI:
            goto rOzV3;
            gIk0z:
            Z7L0H:
            goto ig_7I;
            Y3Q40:
            $drinkyes[] = $v;
            goto VkVAw;
            rOzV3:
            if ($v["status"] == 0) {
                goto lfTdG;
            }
            goto WZV5T;
            VkVAw:
            goto RYrsw;
            goto y6frC;
            ig_7I:
        }
        goto g3I8u;
        VQqPT:
        $bid = $_GPC["bid"];
        goto G9f1Z;
        gKplC:
        $drinkyes = array();
        goto k_OVt;
        LVmFL:
        $drinksYes = array();
        goto FUm73;
        MPmXH:
        $roomsYes = array();
        goto RGOIR;
        k_OVt:
        $drinksno = array();
        goto LVmFL;
        IpzWu:
    }
    public function doPagefinanceData()
    {
        goto p1LMI;
        jPPJL:
        $roomorder = pdo_getall("ymktv_sun_roomorder", array("uniacid" => $_W["uniacid"], "build_id" => $bid));
        goto I7UQz;
        YRKNc:
        $drinkorder = pdo_getall("ymktv_sun_order", array("uniacid" => $_W["uniacid"], "build_id" => $bid));
        goto ojDMP;
        w0Lfc:
        echo json_encode($newData);
        goto p30GD;
        ibxUF:
        foreach ($drinkorder as $k => $v) {
            goto ji9NQ;
            ji9NQ:
            if (!(date("Y-m-d", strtotime("-1 day")) == date("Y-m-d", strtotime($v["pay_time"])))) {
                goto PRsES;
            }
            goto vR_t1;
            IpGss:
            mG7Cs:
            goto hVxED;
            hVxED:
            $drink += $v["money"];
            goto TjT9f;
            MEepO:
            if (!(date("Y-m-d", time()) == date("Y-m-d", strtotime($v["pay_time"])))) {
                goto mG7Cs;
            }
            goto KyerX;
            TjT9f:
            CnUa6:
            goto IlrPX;
            KyerX:
            $todaydrink += $v["money"];
            goto IpGss;
            vR_t1:
            $zuodrink += $v["money"];
            goto PwQW5;
            PwQW5:
            PRsES:
            goto MEepO;
            IlrPX:
        }
        goto BsCfq;
        Yi6qP:
        $bid = $_GPC["bid"];
        goto YRKNc;
        p1LMI:
        global $_W, $_GPC;
        goto Yi6qP;
        dOSzT:
        $newData = array("today" => $todaydrink + $todayroom, "zuo" => $zuodrink + $zuoroom, "all" => $drink + $room);
        goto w0Lfc;
        I7UQz:
        $todayroom = 0;
        goto y0Aiz;
        q2PNA:
        foreach ($roomorder as $k => $v) {
            goto pk1TN;
            z4jYC:
            $todayroom += $v["price"];
            goto Xnay7;
            fzipE:
            $zuoroom += $v["price"];
            goto AEc7T;
            wCsdn:
            $room += $v["price"];
            goto pymuR;
            pymuR:
            r1S_B:
            goto G5vUA;
            AEc7T:
            ixxLg:
            goto wCsdn;
            pk1TN:
            if (!(date("Y-m-d", strtotime("-1 day")) == date("Y-m-d", $v["time"]))) {
                goto vDfX5;
            }
            goto z4jYC;
            Xnay7:
            vDfX5:
            goto r6qER;
            r6qER:
            if (!(date("Y-m-d", time()) == date("Y-m-d", $v["time"]))) {
                goto ixxLg;
            }
            goto fzipE;
            G5vUA:
        }
        goto N4Ebi;
        VvYdD:
        $zuodrink = 0;
        goto xuODn;
        ojDMP:
        $todaydrink = 0;
        goto VvYdD;
        owr4e:
        $room = 0;
        goto q2PNA;
        N4Ebi:
        u0KPX:
        goto dOSzT;
        BsCfq:
        yEv0K:
        goto jPPJL;
        y0Aiz:
        $zuoroom = 0;
        goto owr4e;
        xuODn:
        $drink = 0;
        goto ibxUF;
        p30GD:
    }
    public function doPageBuildOrder()
    {
        goto Yp3Zn;
        hUgkc:
        foreach ($drinkorderyes as $k => $v) {
            goto MdGWO;
            O5I9g:
            YJkob:
            goto oXpH4;
            KAvbk:
            $drinkorderyes[$k]["good_num"] = explode(",", $v["good_num"]);
            goto ngieZ;
            VSh0T:
            $drinkorderyes[$k]["cate_name"] = "酒水";
            goto O5I9g;
            ngieZ:
            $drinkorderyes[$k]["good_imgs"] = explode(",", $v["good_imgs"]);
            goto hIet7;
            hIet7:
            $drinkorderyes[$k]["good_name"] = explode(",", $v["good_name"]);
            goto lWDP5;
            lWDP5:
            $drinkorderyes[$k]["good_id"] = explode(",", $v["good_id"]);
            goto VSh0T;
            MdGWO:
            $drinkorderyes[$k]["good_money"] = explode(",", $v["good_money"]);
            goto KAvbk;
            oXpH4:
        }
        goto j8Y0m;
        EalV6:
        JxcfQ:
        goto fzYm4;
        mVNwz:
        $drinkorderyes = pdo_getall("ymktv_sun_order", array("uniacid" => $_W["uniacid"], "build_id" => $bid, "status" => 1), '', '', "pay_time DESC");
        goto f1k5m;
        Yp3Zn:
        global $_GPC, $_W;
        goto o7hZi;
        Q1kbv:
        z76yJ:
        goto ezPrS;
        o7hZi:
        $bid = $_GPC["bid"];
        goto EMAxu;
        EMAxu:
        $drinkorderno = pdo_getall("ymktv_sun_order", array("uniacid" => $_W["uniacid"], "build_id" => $bid, "status" => 0), '', '', "pay_time DESC");
        goto e4hg5;
        e4hg5:
        $sql = " SELECT * FROM " . tablename("ymktv_sun_goods") . " g " . " JOIN " . tablename("ymktv_sun_roomorder") . " r " . " ON " . " r.gid=g.id" . " WHERE " . " r.uniacid=" . $_W["uniacid"] . " AND " . " r.build_id=" . $bid . " AND " . " r.status=0" . " ORDER BY r.time DESC";
        goto dqh1y;
        f1k5m:
        $sql = " SELECT * FROM " . tablename("ymktv_sun_goods") . " g " . " JOIN " . tablename("ymktv_sun_roomorder") . " r " . " ON " . " r.gid=g.id" . " WHERE " . " r.uniacid=" . $_W["uniacid"] . " AND " . " r.build_id=" . $bid . " AND " . " r.status=1" . " ORDER BY r.time DESC";
        goto JtU9w;
        CtHhq:
        foreach ($drinkorderno as $k => $v) {
            goto TwWxr;
            mDtK0:
            $drinkorderno[$k]["good_name"] = explode(",", $v["good_name"]);
            goto xn1C2;
            Mqcp0:
            $drinkorderno[$k]["good_imgs"] = explode(",", $v["good_imgs"]);
            goto mDtK0;
            xn1C2:
            $drinkorderno[$k]["good_id"] = explode(",", $v["good_id"]);
            goto UvP0T;
            xxZPQ:
            $drinkorderno[$k]["good_num"] = explode(",", $v["good_num"]);
            goto Mqcp0;
            JvO9H:
            DZEhq:
            goto JM7Xs;
            TwWxr:
            $drinkorderno[$k]["good_money"] = explode(",", $v["good_money"]);
            goto xxZPQ;
            UvP0T:
            $drinkorderno[$k]["cate_name"] = "酒水";
            goto JvO9H;
            JM7Xs:
        }
        goto EalV6;
        ezPrS:
        $arr1 = array_merge_recursive($roomorderno, $drinkorderno);
        goto mVNwz;
        UzJuZ:
        $order = array("arr1" => $arr1, "arr2" => $arr2);
        goto T3TdF;
        j8Y0m:
        ddF1Y:
        goto Plk2Z;
        Plk2Z:
        foreach ($roomorderyes as $k => $v) {
            goto TIHaN;
            nw9mU:
            $roomorderyes[$k]["good_imgs"] = explode(",", $v["big_thumbnail"]);
            goto oNsU7;
            r3F_M:
            $roomorderyes[$k]["cate_name"] = "包厢";
            goto b_Vv1;
            TIHaN:
            $roomorderyes[$k]["good_money"] = explode(",", $v["price"]);
            goto f8DQg;
            f8DQg:
            $roomorderyes[$k]["good_num"] = explode(",", 1);
            goto nw9mU;
            oNsU7:
            $roomorderyes[$k]["good_name"] = explode(",", $v["goods_name"]);
            goto qjy1k;
            b_Vv1:
            SCShT:
            goto G0Wof;
            qjy1k:
            $roomorderyes[$k]["good_id"] = explode(",", $v["gid"]);
            goto r3F_M;
            G0Wof:
        }
        goto fasZE;
        fzYm4:
        foreach ($roomorderno as $k => $v) {
            goto dLJu4;
            k79bD:
            NvmpU:
            goto XhLVj;
            QmU9m:
            $roomorderno[$k]["good_num"] = explode(",", 1);
            goto Epc5P;
            vGz1R:
            $roomorderno[$k]["good_id"] = explode(",", $v["gid"]);
            goto bfL6W;
            f9_KV:
            $roomorderno[$k]["good_name"] = explode(",", $v["goods_name"]);
            goto vGz1R;
            bfL6W:
            $roomorderno[$k]["cate_name"] = "包厢";
            goto k79bD;
            Epc5P:
            $roomorderno[$k]["good_imgs"] = explode(",", $v["big_thumbnail"]);
            goto f9_KV;
            dLJu4:
            $roomorderno[$k]["good_money"] = explode(",", $v["price"]);
            goto QmU9m;
            XhLVj:
        }
        goto Q1kbv;
        T3TdF:
        echo json_encode($order);
        goto JPkDH;
        JtU9w:
        $roomorderyes = pdo_fetchall($sql);
        goto hUgkc;
        fasZE:
        TfD3d:
        goto Ac7nz;
        Ac7nz:
        $arr2 = array_merge_recursive($roomorderyes, $drinkorderyes);
        goto UzJuZ;
        dqh1y:
        $roomorderno = pdo_fetchall($sql);
        goto CtHhq;
        JPkDH:
    }
    public function doPagetodayallorder()
    {
        goto FArx5;
        ZUfFK:
        foreach ($roomorder as $k => $v) {
            goto risf4;
            risf4:
            if (!(date("Y-m-d", time()) == date("Y-m-d", $v["time"]))) {
                goto UhJzW;
            }
            goto wqW8B;
            wqW8B:
            if ($v["status"] == 0) {
                goto AJFwW;
            }
            goto Ol0Se;
            g4iP0:
            UhJzW:
            goto E_1X4;
            Lmpp8:
            AJFwW:
            goto Nu8ml;
            woxk6:
            $roomsno[] = $v;
            goto SIh00;
            iM4yI:
            WgYKs:
            goto chK1D;
            E_1X4:
            if ($v["status"] == 0) {
                goto uSlg8;
            }
            goto SAMSt;
            zJ32t:
            FeW1O:
            goto g4iP0;
            FPVv2:
            goto wSCIm;
            goto M4CLK;
            M4CLK:
            uSlg8:
            goto woxk6;
            OB20Y:
            goto FeW1O;
            goto Lmpp8;
            SAMSt:
            $roomsYes[] = $v;
            goto FPVv2;
            Nu8ml:
            $roomno[] = $v;
            goto zJ32t;
            SIh00:
            wSCIm:
            goto iM4yI;
            Ol0Se:
            $roomyes[] = $v;
            goto OB20Y;
            chK1D:
        }
        goto QfjDM;
        wW794:
        $roomorder = pdo_getall("ymktv_sun_roomorder", array("uniacid" => $_W["uniacid"]));
        goto X0EI1;
        LI8Xo:
        J3fQk:
        goto wW794;
        mN0jJ:
        $todayorder = count($drinkno) + count($drinkyes) + count($roomno) + count($roomyes);
        goto Airsz;
        BxHpt:
        $pt_name = pdo_getcolumn("ymktv_sun_system", array("uniacid" => $_W["uniacid"]), "pt_name");
        goto KG820;
        KG820:
        $newData = array("todayorder" => $todayorder, "todayyes" => $todayyes, "todayfk" => count($todayfk), "orderno" => $orderNO, "orderyes" => $orderYes, "pt_name" => $pt_name);
        goto OmmZp;
        JbnLS:
        $drinksno = array();
        goto ZziOE;
        RmuMp:
        $drinkorder = pdo_getall("ymktv_sun_order", array("uniacid" => $_W["uniacid"]));
        goto hWtTK;
        X0EI1:
        $roomno = array();
        goto zxh9f;
        bn18Z:
        $roomsYes = array();
        goto ZUfFK;
        Airsz:
        $todayyes = count($roomyes) + count($drinkyes);
        goto u2huS;
        OmmZp:
        echo json_encode($newData);
        goto Wd0Zc;
        RXcov:
        foreach ($drinkorder as $k => $v) {
            goto ciAa3;
            RyQ4o:
            osOE7:
            goto A0xAO;
            ZDXEz:
            jP08q:
            goto qdpSy;
            wPzl2:
            $drinksYes[] = $v;
            goto oMo0D;
            ciAa3:
            if (!(date("Y-m-d", time()) == date("Y-m-d", strtotime($v["pay_time"])))) {
                goto osOE7;
            }
            goto B_uIO;
            A0xAO:
            if ($v["status"] == 0) {
                goto u4gbB;
            }
            goto wPzl2;
            fF5Iw:
            RCiVL:
            goto wIYMq;
            MGHP3:
            $drinkyes[] = $v;
            goto QS8lx;
            qdpSy:
            $drinkno[] = $v;
            goto v7vcg;
            HAnTH:
            u4gbB:
            goto HRnGR;
            oMo0D:
            goto RCiVL;
            goto HAnTH;
            wIYMq:
            ODgI2:
            goto puNrb;
            QS8lx:
            goto TzXYd;
            goto ZDXEz;
            HRnGR:
            $drinksno[] = $v;
            goto fF5Iw;
            B_uIO:
            if ($v["status"] == 0) {
                goto jP08q;
            }
            goto MGHP3;
            v7vcg:
            TzXYd:
            goto RyQ4o;
            puNrb:
        }
        goto LI8Xo;
        ZziOE:
        $drinksYes = array();
        goto RXcov;
        u2huS:
        $orderNO = count($drinksno) + count($roomsno);
        goto F6h4t;
        F6h4t:
        $orderYes = count($drinksYes) + count($roomsYes);
        goto BxHpt;
        hWtTK:
        $drinkno = array();
        goto a9rD_;
        a9rD_:
        $drinkyes = array();
        goto JbnLS;
        UMvGi:
        $roomsno = array();
        goto bn18Z;
        FArx5:
        global $_W, $_GPC;
        goto RmuMp;
        zxh9f:
        $roomyes = array();
        goto UMvGi;
        qDNTg:
        $todayfk = pdo_getall("ymktv_sun_user", array("uniacid" => $_W["uniacid"]));
        goto mN0jJ;
        QfjDM:
        o_P9d:
        goto qDNTg;
        Wd0Zc:
    }
    public function doPagefinanceallData()
    {
        goto XPVkR;
        a0Jfq:
        gkoX1:
        goto IKaVh;
        MXAee:
        $zuoroom = 0;
        goto wJkAQ;
        jDllL:
        echo json_encode($newData);
        goto rMCsR;
        TBCJ3:
        En8CR:
        goto ZOg30;
        ZOg30:
        $newData = array("today" => $todaydrink + $todayroom, "zuo" => $zuodrink + $zuoroom, "all" => $drink + $room);
        goto jDllL;
        SQ_sf:
        $drinkorder = pdo_getall("ymktv_sun_order", array("uniacid" => $_W["uniacid"]));
        goto jFfHR;
        G9SPF:
        $drink = 0;
        goto iU7fM;
        XOMJU:
        foreach ($roomorder as $k => $v) {
            goto uoeBm;
            FrKqF:
            $todayroom += $v["price"];
            goto MAGxc;
            ya7bE:
            if (!(date("Y-m-d", time()) == date("Y-m-d", $v["time"]))) {
                goto eQow2;
            }
            goto FrKqF;
            kTQbt:
            sbqwc:
            goto kjYIG;
            MAGxc:
            eQow2:
            goto KqEe0;
            xFA2A:
            rEgki:
            goto ya7bE;
            uoeBm:
            if (!(date("Y-m-d", strtotime("-1 day")) == date("Y-m-d", $v["time"]))) {
                goto rEgki;
            }
            goto TOEIJ;
            KqEe0:
            $room += $v["price"];
            goto kTQbt;
            TOEIJ:
            $zuoroom += $v["price"];
            goto xFA2A;
            kjYIG:
        }
        goto TBCJ3;
        XPVkR:
        global $_W, $_GPC;
        goto SQ_sf;
        BoUHf:
        $zuodrink = 0;
        goto G9SPF;
        iU7fM:
        foreach ($drinkorder as $k => $v) {
            goto Oz4Lm;
            qtuKg:
            $zuodrink += $v["money"];
            goto t2v0A;
            t2v0A:
            gzyQG:
            goto HF1Kb;
            HF1Kb:
            if (!(date("Y-m-d", time()) == date("Y-m-d", strtotime($v["pay_time"])))) {
                goto i2FK8;
            }
            goto GG2DW;
            nrsB1:
            $drink += $v["money"];
            goto vRrzf;
            LHZDb:
            i2FK8:
            goto nrsB1;
            Oz4Lm:
            if (!(date("Y-m-d", strtotime("-1 day")) == date("Y-m-d", strtotime($v["pay_time"])))) {
                goto gzyQG;
            }
            goto qtuKg;
            vRrzf:
            wTxpQ:
            goto lBJT9;
            GG2DW:
            $todaydrink += $v["money"];
            goto LHZDb;
            lBJT9:
        }
        goto a0Jfq;
        Ncrv_:
        $todayroom = 0;
        goto MXAee;
        wJkAQ:
        $room = 0;
        goto XOMJU;
        IKaVh:
        $roomorder = pdo_getall("ymktv_sun_roomorder", array("uniacid" => $_W["uniacid"]));
        goto Ncrv_;
        jFfHR:
        $todaydrink = 0;
        goto BoUHf;
        rMCsR:
    }
    public function doPageBuildAllOrder()
    {
        goto jxwBm;
        BWZ5y:
        jbNmD:
        goto SWmJp;
        jNpkx:
        $roomorderno = pdo_fetchall($sql);
        goto jXM2q;
        BX3gT:
        echo json_encode($order);
        goto NPusy;
        ubddv:
        $sql = " SELECT * FROM " . tablename("ymktv_sun_goods") . " g " . " JOIN " . tablename("ymktv_sun_roomorder") . " r " . " ON " . " r.gid=g.id" . " WHERE " . " r.uniacid=" . $_W["uniacid"] . " AND " . " r.status=0" . " ORDER BY r.time DESC";
        goto jNpkx;
        swbMd:
        Hq3g6:
        goto ZaJkT;
        SWmJp:
        $arr1 = array_merge_recursive($roomorderno, $drinkorderno);
        goto w3YxB;
        VjgCt:
        foreach ($drinkorderyes as $k => $v) {
            goto SpEk2;
            rN1FH:
            SQTMd:
            goto nrWbu;
            atwdj:
            $drinkorderyes[$k]["good_imgs"] = explode(",", $v["good_imgs"]);
            goto XryxB;
            caYbv:
            $drinkorderyes[$k]["good_num"] = explode(",", $v["good_num"]);
            goto atwdj;
            SpEk2:
            $drinkorderyes[$k]["good_money"] = explode(",", $v["good_money"]);
            goto caYbv;
            DI9h2:
            $drinkorderyes[$k]["good_id"] = explode(",", $v["good_id"]);
            goto qB7JC;
            XryxB:
            $drinkorderyes[$k]["good_name"] = explode(",", $v["good_name"]);
            goto DI9h2;
            qB7JC:
            $drinkorderyes[$k]["cate_name"] = "酒水";
            goto rN1FH;
            nrWbu:
        }
        goto l9vEP;
        CzAoj:
        $arr2 = array_merge_recursive($roomorderyes, $drinkorderyes);
        goto qoL27;
        qoL27:
        $order = array("arr1" => $arr1, "arr2" => $arr2);
        goto BX3gT;
        ya2JK:
        $drinkorderno = pdo_getall("ymktv_sun_order", array("uniacid" => $_W["uniacid"], "status" => 0), '', '', "pay_time DESC");
        goto ubddv;
        vxXJZ:
        foreach ($roomorderyes as $k => $v) {
            goto mn7j8;
            GQC0b:
            $roomorderyes[$k]["cate_name"] = "包厢";
            goto uWVlj;
            rlEEN:
            $roomorderyes[$k]["good_imgs"] = explode(",", $v["thumbnail"]);
            goto AZI0V;
            I2oDn:
            $roomorderyes[$k]["good_num"] = explode(",", 1);
            goto rlEEN;
            mn7j8:
            $roomorderyes[$k]["good_money"] = explode(",", $v["price"]);
            goto I2oDn;
            i0Flk:
            $roomorderyes[$k]["good_id"] = explode(",", $v["gid"]);
            goto GQC0b;
            uWVlj:
            QtKhI:
            goto MMMS0;
            AZI0V:
            $roomorderyes[$k]["good_name"] = explode(",", $v["goods_name"]);
            goto i0Flk;
            MMMS0:
        }
        goto j0LqC;
        j0LqC:
        ezJkQ:
        goto CzAoj;
        l9vEP:
        I05iz:
        goto vxXJZ;
        jxwBm:
        global $_GPC, $_W;
        goto ya2JK;
        w3YxB:
        $drinkorderyes = pdo_getall("ymktv_sun_order", array("uniacid" => $_W["uniacid"], "status" => 1), '', '', "pay_time DESC");
        goto H8OKs;
        jXM2q:
        foreach ($drinkorderno as $k => $v) {
            goto ybNqk;
            O21jv:
            iU7IF:
            goto igNvr;
            rYFH9:
            $drinkorderno[$k]["good_num"] = explode(",", $v["good_num"]);
            goto NX4pF;
            NX4pF:
            $drinkorderno[$k]["good_imgs"] = explode(",", $v["good_imgs"]);
            goto uDgm9;
            ybNqk:
            $drinkorderno[$k]["good_money"] = explode(",", $v["good_money"]);
            goto rYFH9;
            zYve_:
            $drinkorderno[$k]["cate_name"] = "酒水";
            goto O21jv;
            ARBUg:
            $drinkorderno[$k]["good_id"] = explode(",", $v["good_id"]);
            goto zYve_;
            uDgm9:
            $drinkorderno[$k]["good_name"] = explode(",", $v["good_name"]);
            goto ARBUg;
            igNvr:
        }
        goto swbMd;
        ZaJkT:
        foreach ($roomorderno as $k => $v) {
            goto o962Y;
            zu4Cf:
            $roomorderno[$k]["good_num"] = explode(",", 1);
            goto omq7o;
            omq7o:
            $roomorderno[$k]["good_imgs"] = explode(",", $v["thumbnail"]);
            goto vKd0M;
            VkeoC:
            $roomorderno[$k]["good_id"] = explode(",", $v["gid"]);
            goto ZrXyl;
            vKd0M:
            $roomorderno[$k]["good_name"] = explode(",", $v["goods_name"]);
            goto VkeoC;
            ZrXyl:
            $roomorderno[$k]["cate_name"] = "包厢";
            goto T69ep;
            T69ep:
            g_Sv_:
            goto dfHTV;
            o962Y:
            $roomorderno[$k]["good_money"] = explode(",", $v["price"]);
            goto zu4Cf;
            dfHTV:
        }
        goto BWZ5y;
        gxPVV:
        $roomorderyes = pdo_fetchall($sql);
        goto VjgCt;
        H8OKs:
        $sql = " SELECT * FROM " . tablename("ymktv_sun_goods") . " g " . " JOIN " . tablename("ymktv_sun_roomorder") . " r " . " ON " . " r.gid=g.id" . " WHERE " . " r.uniacid=" . $_W["uniacid"] . " AND " . " r.status=1" . " ORDER BY r.time DESC";
        goto gxPVV;
        NPusy:
    }
    public function doPageToupload1()
    {
        goto Blf8B;
        Iw8X8:
        DV6a5:
        goto LJsag;
        D9_Y0:
        $upload->maxSize = 30292200;
        goto kcM9q;
        hQ_sD:
        $upload->savePath = "../attachment/";
        goto xRUAQ;
        VXXT_:
        exit;
        goto AXe75;
        WaDGb:
        cAu6z:
        goto d4d1g;
        Kixa0:
        require_once TD_PATH . "/class/UploadFile.class.php";
        goto eaGSX;
        Blf8B:
        global $_W, $_GPC;
        goto BFoQO;
        EwE9c:
        exit;
        goto Iw8X8;
        x1oSK:
        $file = $_FILES["file"];
        goto Kixa0;
        pnXjd:
        goto QWl3K;
        goto WaDGb;
        LJsag:
        $newimg = $uploadList["0"]["savename"];
        goto pS9S0;
        PSkOB:
        $uploadList = $upload->uploadOne($file);
        goto rM4qj;
        BFoQO:
        if (!is_uploaded_file($_FILES["file"]["tmp_name"])) {
            goto cAu6z;
        }
        goto x1oSK;
        rM4qj:
        if ($uploadList) {
            goto DV6a5;
        }
        goto pyYsm;
        eaGSX:
        $upload = new UploadFile();
        goto D9_Y0;
        AXe75:
        QWl3K:
        goto oUYIS;
        xRUAQ:
        $upload->saveRule = uniqid;
        goto PSkOB;
        d4d1g:
        echo 2;
        goto VXXT_;
        pyYsm:
        echo json_encode($upload->getErrorMsg());
        goto EwE9c;
        kcM9q:
        $upload->allowExts = explode(",", "png,gif,jpeg,pjpeg,bmp,x-png,jpg");
        goto hQ_sD;
        pS9S0:
        echo json_encode($newimg);
        goto pnXjd;
        oUYIS:
    }

    function doPagebuildData()
    {
        global $_W, $_GPC;
        $openid = $_GPC["openid"];
        $data = pdo_getall("ymktv_sun_building", array("uniacid" => $_W["uniacid"]));
        $wineDatas = pdo_getall("ymktv_sun_keepwine", array("uniacid" => $_W["uniacid"], "openid" => $openid));
        $wineData = array();
        foreach ($wineDatas as $k => $v) {
            if ($v["status"] == 1 || $v["status"] == 0) {
                $wineData[] = $v;
            }
        }
        $wine_num = 0;
        foreach ($wineData as $k => $v) {
            $wine_num += $v["winenum"];
        }
        $allnum = pdo_getcolumn("ymktv_sun_wineset", array("uniacid" => $_W["uniacid"]), "wine_num");
        // halt($allnum);
        $newData = array("build" => $data, "wine_num" => $allnum - $wine_num);
        echo json_encode($newData);
    }

    public function doPageSavekeepwine()
    {
        goto LH1y9;
        N80tM:
        if (!is_error($remotestatus)) {
            goto ZBxNI;
        }
        goto G3tO0;
        RtzYm:
        echo json_encode($res);
        goto qwWVN;
        m2Y3P:
        atEm0:
        goto Bpo5b;
        wUjGu:
        $wineData = pdo_getall("ymktv_sun_keepwine", array("uniacid" => $_W["uniacid"], "openid" => $openid, "status !=" => 2));
        goto PqPhe;
        qd0XI:
        bBhlp:
        goto RtzYm;
        f_vhE:
        $imgSrc = rtrim($_GPC["imgSrc"], "&quot;");
        goto BQtmH;
        I7jU_:
        $wineName = $_GPC["wineName"];
        goto f_vhE;
        xVtYK:
        Z6H7F:
        goto gN5bJ;
        LtgrW:
        $userName = $_GPC["userName"];
        goto I7jU_;
        G3tO0:
        message("远程附件上传失败，请检查配置并重新上传");
        goto f9z2S;
        P9xaH:
        DcwJs:
        goto Sdpqz;
        PqPhe:
        $wine_num = $wineNum;
        goto nY13B;
        Bpo5b:
        $allnum = pdo_getcolumn("ymktv_sun_wineset", array("uniacid" => $_W["uniacid"]), "wine_num");
        goto ahJwe;
        ahJwe:
        $pathname = $imgSrc;
        goto eXqvL;
        BQtmH:
        $imgSrc = ltrim($imgSrc, "&quot;");
        goto gxeDh;
        k6VNG:
        $openid = $_GPC["openid"];
        goto uMYYA;
        nY13B:
        foreach ($wineData as $k => $v) {
            $wine_num += $v["winenum"];
            GH_gj:
        }
        goto m2Y3P;
        gN5bJ:
        $data = array("mobile" => $mobile, "username" => $userName, "winename" => $wineName, "winenum" => $wineNum, "imgsrc" => $imgSrc, "build_id" => $id, "uniacid" => $_W["uniacid"], "addtime" => time(), "order_num" => date("YmdHis", time()) . rand(1000, 9999), "status" => 0, "openid" => $openid);
        goto p0m5m;
        Sdpqz:
        $res = pdo_insert("ymktv_sun_keepwine", $data);
        goto qd0XI;
        W2UYd:
        $mobile = $_GPC["mobile"];
        goto LtgrW;
        eXqvL:
        @(require_once IA_ROOT . "/framework/function/file.func.php");
        goto b33hK;
        f8Aqc:
        $remotestatus = @file_remote_upload($pathname);
        goto N80tM;
        IHH2Q:
        goto bBhlp;
        goto P9xaH;
        p0m5m:
        if ($allnum - $wine_num >= 0) {
            goto DcwJs;
        }
        goto UIden;
        b33hK:
        if (empty($_W["setting"]["remote"]["type"])) {
            goto Z6H7F;
        }
        goto f8Aqc;
        gxeDh:
        $id = $_GPC["id"];
        goto k6VNG;
        uMYYA:
        $wineNum = $_GPC["wineNum"];
        goto wUjGu;
        f9z2S:
        ZBxNI:
        goto xVtYK;
        LH1y9:
        global $_GPC, $_W;
        goto W2UYd;
        UIden:
        $res = 0;
        goto IHH2Q;
        qwWVN:
    }
    public function doPagekeepwineData()
    {
        goto m1wJ0;
        I4tep:
        foreach ($data as $k => $v) {
            goto EsCYl;
            omJLp:
            jkppm:
            goto QTjCq;
            OunnN:
            $data[$k]["b_name"] = $system["pt_name"] . "(" . "总店" . ")";
            goto uCIjU;
            Cak4t:
            $data[$k]["b_name"] = pdo_getcolumn("ymktv_sun_building", array("uniacid" => $_W["uniacid"], "id" => $v["build_id"]), "b_name");
            goto Up0rt;
            uCIjU:
            Z3L7q:
            goto omJLp;
            WK5Av:
            $data[$k]["expire"] = date("Y-m-d H:i:s", $v["addtime"] + $time * 24 * 3600);
            goto hDHJY;
            Up0rt:
            goto Z3L7q;
            goto ZBZ8_;
            ZBZ8_:
            U9jEg:
            goto OunnN;
            EsCYl:
            $data[$k]["addtime"] = date("Y-m-d H:i:s", $v["addtime"]);
            goto WK5Av;
            hDHJY:
            if ($v["build_id"] == 0) {
                goto U9jEg;
            }
            goto Cak4t;
            QTjCq:
        }
        goto DXeYK;
        YJNNB:
        $extwine = array();
        goto ESYUS;
        DkpQB:
        $newData = array("Dkeep" => $Dkeep, "Ykeep" => $Ykeep, "extwine" => $extwine);
        goto mhZwZ;
        ESYUS:
        foreach ($data as $k => $v) {
            goto i1J07;
            pFlI4:
            tu3gZ:
            goto QhCas;
            U4uGy:
            $Ykeep[] = $v;
            goto xUqSf;
            QhCas:
            lFuRl:
            goto h9C_R;
            i1J07:
            if (!($v["status"] == 0)) {
                goto RMdEX;
            }
            goto XM7Or;
            QVQ0I:
            if (!($v["status"] == 2)) {
                goto tu3gZ;
            }
            goto tLtM4;
            tLtM4:
            $extwine[] = $v;
            goto pFlI4;
            xUqSf:
            HHz80:
            goto QVQ0I;
            XM7Or:
            $Dkeep[] = $v;
            goto hXqQm;
            MFTPr:
            if (!($v["status"] == 1)) {
                goto HHz80;
            }
            goto U4uGy;
            hXqQm:
            RMdEX:
            goto MFTPr;
            h9C_R:
        }
        goto t0Geb;
        tN2E5:
        $time = pdo_getcolumn("ymktv_sun_wineset", array("uniacid" => $_W["uniacid"]), "day_num");
        goto cz9D7;
        m1wJ0:
        global $_GPC, $_W;
        goto TXBdk;
        BMUh7:
        $Dkeep = array();
        goto my0w0;
        TXBdk:
        $openid = $_GPC["openid"];
        goto MbKnb;
        MbKnb:
        $data = pdo_getall("ymktv_sun_keepwine", array("uniacid" => $_W["uniacid"], "openid" => $openid), '', '', "addtime DESC");
        goto tN2E5;
        t0Geb:
        BHIB6:
        goto DkpQB;
        mhZwZ:
        echo json_encode($newData);
        goto RV8vy;
        DXeYK:
        sLme7:
        goto BMUh7;
        cz9D7:
        $system = pdo_get("ymktv_sun_system", array("uniacid" => $_W["uniacid"]));
        goto I4tep;
        my0w0:
        $Ykeep = array();
        goto YJNNB;
        RV8vy:
    }
    public function doPagebuildkeepwineData()
    {
        goto rbovk;
        tSNGS:
        $extwine = array();
        goto gpjwq;
        AViYr:
        yg1c3:
        goto Em60J;
        mXGyt:
        $bid = $_GPC["bid"];
        goto qPOgR;
        en8OK:
        echo json_encode($newData);
        goto lwgQy;
        qPOgR:
        $data = pdo_getall("ymktv_sun_keepwine", array("uniacid" => $_W["uniacid"], "build_id" => $bid), '', '', "addtime DESC");
        goto ADOSF;
        qvNDT:
        ADYP0:
        goto DCpfa;
        DCpfa:
        $newData = array("Dkeep" => $Dkeep, "Ykeep" => $Ykeep, "extwine" => $extwine);
        goto en8OK;
        D7fLQ:
        $system = pdo_get("ymktv_sun_system", array("uniacid" => $_W["uniacid"]));
        goto bN9zK;
        ADOSF:
        $time = pdo_getcolumn("ymktv_sun_wineset", array("uniacid" => $_W["uniacid"]), "day_num");
        goto D7fLQ;
        w74U_:
        $Ykeep = array();
        goto tSNGS;
        rbovk:
        global $_GPC, $_W;
        goto mXGyt;
        gpjwq:
        foreach ($data as $k => $v) {
            goto Z01dR;
            QKLAy:
            $Dkeep[] = $v;
            goto GXmxA;
            PDBQA:
            $Ykeep[] = $v;
            goto S9zAd;
            Z01dR:
            if (!($v["status"] == 0)) {
                goto Eyj9H;
            }
            goto QKLAy;
            S9zAd:
            mcHxg:
            goto WSf7f;
            q0afj:
            RWnYQ:
            goto l8txj;
            HODfo:
            mpbBv:
            goto q0afj;
            lQezA:
            $extwine[] = $v;
            goto HODfo;
            GXmxA:
            Eyj9H:
            goto Yt2mM;
            Yt2mM:
            if (!($v["status"] == 1)) {
                goto mcHxg;
            }
            goto PDBQA;
            WSf7f:
            if (!($v["status"] == 2)) {
                goto mpbBv;
            }
            goto lQezA;
            l8txj:
        }
        goto qvNDT;
        bN9zK:
        foreach ($data as $k => $v) {
            goto Nt5Ra;
            Nt5Ra:
            $data[$k]["addtime"] = date("Y-m-d H:i:s", $v["addtime"]);
            goto Po0TV;
            DFcRQ:
            $data[$k]["b_name"] = $system["pt_name"] . "(" . "总店" . ")";
            goto xzFdK;
            yQ6aR:
            $data[$k]["b_name"] = pdo_getcolumn("ymktv_sun_building", array("uniacid" => $_W["uniacid"], "id" => $v["build_id"]), "b_name");
            goto r058U;
            r058U:
            goto ICjRm;
            goto ZDxMR;
            Po0TV:
            $data[$k]["expire"] = date("Y-m-d H:i:s", $v["addtime"] + $time * 24 * 3600);
            goto ADrgX;
            ZDxMR:
            xkzC_:
            goto DFcRQ;
            aZCVC:
            IPpXr:
            goto GVrw0;
            xzFdK:
            ICjRm:
            goto aZCVC;
            ADrgX:
            if ($v["build_id"] == 0) {
                goto xkzC_;
            }
            goto yQ6aR;
            GVrw0:
        }
        goto AViYr;
        Em60J:
        $Dkeep = array();
        goto w74U_;
        lwgQy:
    }
    public function doPageDelivery()
    {
        goto kN7O4;
        nf6pj:
        ikZ5M:
        goto zDU0d;
        b8IWU:
        $res = 0;
        goto UHZjP;
        kN7O4:
        global $_W, $_GPC;
        goto JBvTg;
        dFhCs:
        echo json_encode($res);
        goto yy4gM;
        JBvTg:
        $id = $_GPC["id"];
        goto IkePo;
        NQGr4:
        bFo9S:
        goto dFhCs;
        zDU0d:
        $res = pdo_update("ymktv_sun_keepwine", array("status" => 1), array("id" => $id));
        goto NQGr4;
        UHZjP:
        goto bFo9S;
        goto nf6pj;
        IkePo:
        if ($id) {
            goto ikZ5M;
        }
        goto b8IWU;
        yy4gM:
    }
    public function doPagewineDatanum()
    {
        goto UNv60;
        M2c0C:
        $data = pdo_getall("ymktv_sun_keepwine", array("uniacid" => $_W["uniacid"], "openid" => $openid, "status !=" => 2));
        goto Vp9OA;
        noo8x:
        mIpw3:
        goto mWui7;
        HwziZ:
        echo json_encode($newData);
        goto UEkQE;
        Vp9OA:
        $num = 0;
        goto s4bAG;
        UNv60:
        global $_W, $_GPC;
        goto rGuyC;
        s4bAG:
        foreach ($data as $k => $v) {
            $num += $v["winenum"];
            GP6P5:
        }
        goto noo8x;
        mWui7:
        $winenum = pdo_getcolumn("ymktv_sun_wineset", array("uniacid" => $_W["uniacid"]), "wine_num");
        goto VCSIW;
        rGuyC:
        $openid = $_GPC["openid"];
        goto M2c0C;
        VCSIW:
        $newData = array("wineData" => $data, "y_num" => $num, "k_num" => $winenum - $num);
        goto HwziZ;
        UEkQE:
    }
    public function doPagedelkeepwine()
    {
        goto KMNoK;
        yU_gm:
        $res = pdo_delete("ymktv_sun_keepwine", array("uniacid" => $_W["uniacid"], "id" => $id));
        goto vjdwQ;
        jvQnV:
        $id = $_GPC["id"];
        goto yU_gm;
        vjdwQ:
        echo json_encode($res);
        goto T1mON;
        KMNoK:
        global $_GPC, $_W;
        goto jvQnV;
        T1mON:
    }
    public function doPageextractWine()
    {
        goto kbUyq;
        pt5P3:
        echo json_encode($res);
        goto ykUTZ;
        m2xo5:
        $data = pdo_get("ymktv_sun_keepwine", array("uniacid" => $_W["uniacid"], "id" => $id, "openid" => $openid));
        goto i33Il;
        ekPyK:
        $id = $_GPC["id"];
        goto fHdvs;
        KmAoZ:
        goto mV1Ys;
        goto ASUt7;
        kbUyq:
        global $_GPC, $_W;
        goto ekPyK;
        v4vR_:
        $newData = array("status" => 2, "room_num" => $_GPC["room_num"], "remark" => $_GPC["remark"], "exttime" => date("Y-m-d H:i:s", time()));
        goto m2xo5;
        i33Il:
        if ($data["status"] == 1) {
            goto ldy9m;
        }
        goto fUe2D;
        IXZnx:
        mV1Ys:
        goto pt5P3;
        ZzygB:
        $res = pdo_update("ymktv_sun_keepwine", $newData, array("uniacid" => $_W["uniacid"], "openid" => $openid, "id" => $id));
        goto IXZnx;
        fUe2D:
        $res = 0;
        goto KmAoZ;
        fHdvs:
        $openid = $_GPC["openid"];
        goto v4vR_;
        ASUt7:
        ldy9m:
        goto ZzygB;
        ykUTZ:
    }
    public function doPagevipRecharge()
    {
        goto eI_1N;
        QWwqN:
        ypCHW:
        goto Eh8_f;
        YGgUK:
        $newData = array("recharge" => $data, "isopen" => $isopen, "details" => $details, "iscun" => count($data));
        goto GkiYR;
        eI_1N:
        global $_W, $_GPC;
        goto fDRM6;
        UYZbU:
        $details = pdo_getcolumn("ymktv_sun_vip_open", array("uniacid" => $_W["uniacid"]), "vip_details");
        goto YGgUK;
        fDRM6:
        $data = pdo_getall("ymktv_sun_money", array("uniacid" => $_W["uniacid"], "status" => 1), '', '', "recharge ASC");
        goto u_1Po;
        Eh8_f:
        $openid = $_GPC["openid"];
        goto gFDne;
        gFDne:
        $isopen = pdo_getcolumn("ymktv_sun_vipopen", array("uniacid" => $_W["uniacid"], "openid" => $openid), "isopen");
        goto UYZbU;
        GkiYR:
        echo json_encode($newData);
        goto qp5Dg;
        u_1Po:
        foreach ($data as $k => $v) {
            goto rwHQh;
            rwHQh:
            $data[$k]["recharge"] = floor($v["recharge"]);
            goto g768O;
            K_stM:
            yCFhH:
            goto jeGb3;
            g768O:
            $data[$k]["youhui"] = floor($v["youhui"]);
            goto K_stM;
            jeGb3:
        }
        goto QWwqN;
        qp5Dg:
    }
    public function doPageVipkaData()
    {
        goto YngbW;
        Cf3Sq:
        $newData = array("vipData" => $data, "wel" => $wel, "isopen" => $isopen);
        goto vePLn;
        HJ4gI:
        $isopen = pdo_get("ymktv_sun_vipopen", array("uniacid" => $_W["uniacid"], "openid" => $openid));
        goto ZDj5z;
        yyNN5:
        $openid = $_GPC["openid"];
        goto WqK2C;
        vePLn:
        echo json_encode($newData);
        goto R5Y7n;
        WqK2C:
        $data = pdo_getall("ymktv_sun_vipka", array("uniacid" => $_W["uniacid"]), '', '', "vip_term ASC");
        goto n8OgA;
        ZDj5z:
        $isopen["end_time"] = date("Y-m-d H:i:s", $isopen["end_time"]);
        goto Cf3Sq;
        YngbW:
        global $_W, $_GPC;
        goto yyNN5;
        n8OgA:
        $wel = pdo_getall("ymktv_sun_vipwelfare", array("uniacid" => $_W["uniacid"]), '', '', "addtime DESC");
        goto HJ4gI;
        R5Y7n:
    }
    public function doPageOpenVip()
    {
        goto DtfvE;
        T0cWj:
        $vipData = pdo_get("ymktv_sun_vipka", array("uniacid" => $_W["uniacid"], "id" => $id));
        goto P6W3z;
        R2roM:
        echo json_encode($res);
        goto Pwmv5;
        P6W3z:
        $term = $vipData["vip_term"];
        goto IHyw3;
        KcsA1:
        $res = pdo_insert("ymktv_sun_vipopen", $data);
        goto OIwjK;
        IHyw3:
        $endtime = date("Y-m-d H:i:s", strtotime("{$term} months", time()));
        goto srgNA;
        g6o3e:
        $res = pdo_update("ymktv_sun_vipopen", array("end_time" => $end, "isopen" => 1), array("uniacid" => $_W["uniacid"], "openid" => $openid));
        goto Kc_lO;
        SOaOX:
        $id = $_GPC["id"];
        goto T0cWj;
        GkbkM:
        $vipOpen = pdo_get("ymktv_sun_vipopen", array("uniacid" => $_W["uniacid"], "openid" => $openid));
        goto t6DDF;
        t6DDF:
        if (!$vipOpen) {
            goto l2_P0;
        }
        goto dHqnY;
        OIwjK:
        Fmyza:
        goto R2roM;
        WM8b0:
        $openid = $_GPC["openid"];
        goto SOaOX;
        srgNA:
        $data = array("start_time" => time(), "end_time" => strtotime($endtime), "uniacid" => $_W["uniacid"], "isopen" => 1, "openid" => $openid);
        goto GkbkM;
        DtfvE:
        global $_W, $_GPC;
        goto WM8b0;
        dHqnY:
        $end = strtotime(date("Y-m-d H:i:s", strtotime("{$term} months", $vipOpen["end_time"])));
        goto g6o3e;
        ALK4R:
        l2_P0:
        goto KcsA1;
        Kc_lO:
        goto Fmyza;
        goto ALK4R;
        Pwmv5:
    }
    public function doPageinaryRecharge()
    {
        goto MDjwk;
        cW1om:
        foreach ($data as $k => $v) {
            goto QyMlV;
            Zm5WH:
            $data[$k]["youhui"] = floor($v["youhui"]);
            goto I2IFl;
            QyMlV:
            $data[$k]["recharge"] = floor($v["recharge"]);
            goto Zm5WH;
            I2IFl:
            GoQwC:
            goto JnOBB;
            JnOBB:
        }
        goto jBSor;
        acfk7:
        $balance = 0;
        goto wNqrx;
        PC74N:
        $balance = pdo_getcolumn("ymktv_sun_user_balance", array("uniacid" => $_W["uniacid"], "openid" => $openid), "money");
        goto hLeYx;
        jBSor:
        vX1P8:
        goto AnbLq;
        MDjwk:
        global $_W, $_GPC;
        goto X6v9u;
        wNqrx:
        cT6_d:
        goto Au1ZQ;
        AnbLq:
        $isopen = pdo_getcolumn("ymktv_sun_vipopen", array("uniacid" => $_W["uniacid"], "openid" => $openid), "isopen");
        goto PC74N;
        hLeYx:
        if ($balance) {
            goto cT6_d;
        }
        goto acfk7;
        X6v9u:
        $openid = $_GPC["openid"];
        goto ahh29;
        GLiMB:
        echo json_encode($newData);
        goto WmPjt;
        ahh29:
        $data = pdo_getall("ymktv_sun_inary_money", array("uniacid" => $_W["uniacid"], "status" => 1), '', '', "recharge ASC");
        goto cW1om;
        Au1ZQ:
        $newData = array("inary" => $data, "balance" => $balance, "isopen" => $isopen, "iscun" => count($data));
        goto GLiMB;
        WmPjt:
    }
    public function doPageRechargeamount()
    {
        goto FgDuF;
        JrlR9:
        if ($vip_open == 1) {
            goto oQHck;
        }
        goto zJQYG;
        D2mTP:
        pdo_insert("ymktv_sun_detailed", $newdata);
        goto rhJqV;
        VTaJJ:
        HAKha:
        goto KCd06;
        q0umy:
        if (!$userbalance) {
            goto HNZ8w;
        }
        goto xL48d;
        FgDuF:
        global $_GPC, $_W;
        goto FDNxR;
        pi5tu:
        $total = $total + $youhui;
        goto SHR8I;
        rk53x:
        if (!$res) {
            goto P7_ZM;
        }
        goto Ca0H6;
        T_naA:
        $res = pdo_update("ymktv_sun_user_balance", array("money" => $prcie), array("uniacid" => $_W["uniacid"], "openid" => $openid));
        goto S7RuC;
        b6pdN:
        hzBlh:
        goto Qpk_w;
        dVYwb:
        $data = array("money" => $total, "openid" => $openid, "uniacid" => $_W["uniacid"]);
        goto enlKc;
        l0bqa:
        hWkvM:
        goto pi5tu;
        Qpk_w:
        $moneyData = $vip_money;
        goto dSpFq;
        bisCM:
        $res = pdo_insert("ymktv_sun_user_balance", $data);
        goto GGE0K;
        GGE0K:
        Jfh7T:
        goto rk53x;
        jYBDK:
        echo json_encode($res);
        goto pA6oB;
        enlKc:
        $userbalance = pdo_get("ymktv_sun_user_balance", array("uniacid" => $_W["uniacid"], "openid" => $openid));
        goto q0umy;
        Nm2B0:
        HNZ8w:
        goto bisCM;
        rhJqV:
        YC1NL:
        goto rSgaK;
        igl0u:
        $moneyData = $inary_money;
        goto xqO_i;
        dSpFq:
        rdn0T:
        goto VTaJJ;
        SHR8I:
        MqZVU:
        goto dVYwb;
        XrTqy:
        foreach ($moneyData as $k => $v) {
            goto Ow3i0;
            qJFh0:
            D8sWd:
            goto IhcA1;
            Ow3i0:
            if (!($total >= $v["recharge"])) {
                goto c0fdy;
            }
            goto veunO;
            LX0H6:
            c0fdy:
            goto qJFh0;
            veunO:
            $youhui = $v["youhui"];
            goto LX0H6;
            IhcA1:
        }
        goto l0bqa;
        tpJBS:
        $inary_money = pdo_getall("ymktv_sun_inary_money", array("uniacid" => $_W["uniacid"], "status" => 1), '', '', "recharge ASC");
        goto mXKP0;
        DS9bN:
        if ($vip["isopen"] == 1) {
            goto hzBlh;
        }
        goto igl0u;
        mXKP0:
        $vip_open = $this->shopvipopen();
        goto JrlR9;
        HOyzl:
        $youhui = 0;
        goto XrTqy;
        xqO_i:
        goto rdn0T;
        goto b6pdN;
        KCd06:
        if (!$moneyData) {
            goto MqZVU;
        }
        goto HOyzl;
        uULqi:
        oQHck:
        goto DS9bN;
        AIaMB:
        $vip = pdo_get("ymktv_sun_vipopen", array("uniacid" => $_W["uniacid"], "openid" => $openid));
        goto vH1b4;
        dBrF4:
        $total = $_GPC["total"];
        goto KWB41;
        FDNxR:
        $openid = $_GPC["openid"];
        goto dBrF4;
        zJQYG:
        $moneyData = $inary_money;
        goto s2Z7V;
        KWB41:
        $details_name = "充值";
        goto AIaMB;
        rSgaK:
        P7_ZM:
        goto jYBDK;
        s2Z7V:
        goto HAKha;
        goto uULqi;
        Ca0H6:
        $newdata = array("details_name" => $details_name, "details_money" => "+" . $total, "openid" => $openid, "uniacid" => $_W["uniacid"], "addtime" => time());
        goto rdnOU;
        S7RuC:
        goto Jfh7T;
        goto Nm2B0;
        xL48d:
        $prcie = $userbalance["money"] + $total;
        goto T_naA;
        rdnOU:
        if (!$res) {
            goto YC1NL;
        }
        goto D2mTP;
        vH1b4:
        $vip_money = pdo_getall("ymktv_sun_money", array("uniacid" => $_W["uniacid"], "status" => 1), '', '', "recharge ASC");
        goto tpJBS;
        pA6oB:
    }
    public function doPageBalancePay()
    {
        goto x4wzp;
        RZXg9:
        dXgJ0:
        goto NkNmH;
        x4wzp:
        global $_W, $_GPC;
        goto vu54f;
        xFzVV:
        b6q0T:
        goto Yv7eP;
        YkjqB:
        TRHPP:
        goto xFzVV;
        vu54f:
        $total = $_GPC["total"];
        goto oyJ3H;
        NkNmH:
        $price = $balance["money"] - $total;
        goto qcjiA;
        oyJ3H:
        $openid = $_GPC["openid"];
        goto tYtel;
        pdoqo:
        if (!$res) {
            goto TRHPP;
        }
        goto ByR0T;
        qcjiA:
        $res = pdo_update("ymktv_sun_user_balance", array("money" => $price), array("uniacid" => $_W["uniacid"], "openid" => $openid));
        goto Kyy3o;
        tYtel:
        $details_name = $_GPC["name"];
        goto XtHek;
        XtHek:
        $balance = pdo_get("ymktv_sun_user_balance", array("uniacid" => $_W["uniacid"], "openid" => $openid));
        goto yKyng;
        yKyng:
        if ($balance["money"] >= $total) {
            goto dXgJ0;
        }
        goto V9UUn;
        rAdNt:
        goto b6q0T;
        goto RZXg9;
        V9UUn:
        $res = 0;
        goto rAdNt;
        ByR0T:
        pdo_insert("ymktv_sun_detailed", $data);
        goto YkjqB;
        Yv7eP:
        echo json_encode($res);
        goto shTCp;
        Kyy3o:
        $data = array("details_name" => $details_name, "details_money" => -$total, "openid" => $openid, "uniacid" => $_W["uniacid"], "addtime" => time());
        goto pdoqo;
        shTCp:
    }



    public function dopageFineBalance()
    {
        goto Qk6cg;
        xQg76:
        $data = pdo_getall("ymktv_sun_detailed", array("uniacid" => $_W["uniacid"], "openid" => $openid), '', '', "addtime DESC");
        goto BqbO3;
        IVngV:
        echo json_encode($data);
        goto y5CB2;
        Qk6cg:
        global $_W, $_GPC;
        goto n14Hk;
        n14Hk:
        $openid = $_GPC["openid"];
        goto xQg76;
        BqbO3:
        foreach ($data as $k => $v) {
            $data[$k]["addtime"] = date("Y-m-d H:i:s", $v["addtime"]);
            J5RY3:
        }
        goto bcQqc;
        bcQqc:
        BAGkM:
        goto IVngV;
        y5CB2:
    }
    public function shopvipopen()
    {
        goto w7mvh;
        w7mvh:
        global $_W;
        goto A2ila;
        A2ila:
        $vip_open = pdo_getcolumn("ymktv_sun_vip_open", array("uniacid" => $_W["uniacid"]), "vip_open");
        goto q7oXj;
        q7oXj:
        return $vip_open;
        goto eq8BY;
        eq8BY:
    }
    public function doPageshopIsvipopen()
    {
        goto BQjrM;
        NXs3i:
        $vip_open = $this->shopvipopen();
        goto Yoadg;
        BQjrM:
        global $_W;
        goto NXs3i;
        Yoadg:
        echo json_encode($vip_open);
        goto m1ll1;
        m1ll1:
    }
    public function doPagesudoku(){
      global $_W, $_GPC;
      $suduku = pdo_getall("ymktv_sun_sudoku", array("uniacid" => $_W["uniacid"]));
      echo json_encode($suduku);

    }

    public function doPageservicebell(){
        global $_W, $_GPC;
        $room = $_GPC['room'];
        $data =  ['room'=>$room,'call_time'=>time()];
        $res = pdo_insert("ymktv_sun_bell",$data);
        echo json_encode($res);

      }

   

    public function doPagepayhistory(){
      global $_W, $_GPC;
      $openid = $_GPC["openid"];
      $payhistory = pdo_getall("ymktv_sun_order", array("uniacid" => $_W["uniacid"],'user_id' => $openid));
    //   halt($payhistory);
      $new_payhistory = [];
      foreach ($payhistory as $key => $value) {
        if (strpos($value['good_id'],',')) {
           $good_id =  explode(",", $value['good_id']);    
           foreach ($good_id as $key996 => $value996) {
            if (!in_array($value996,$new_payhistory)) {
                $new_payhistory[] = $value996;
            }
           }
        }else {
            if (!in_array($value['good_id'],$new_payhistory)) {
                $new_payhistory[] = $value['good_id'];
            }
        }
      }
      $new_drinks = [];
      $drinks = pdo_getall("ymktv_sun_drinks", array("uniacid" => $_W["uniacid"]));
      foreach ($drinks as $key => $value) {
         foreach ($new_payhistory as $key2 => $value2) {
             if ($value2 == $value['id']) {
                $new_drinks[] =  $value;
             }
         }
      }
      // halt($new_drinks);
      echo json_encode($new_drinks);
    }


   //取酒列表
   public function doPagetakedrink(){
     global $_W, $_GPC;
     $building = $_GPC["building"];   
     $drinks = pdo_getall("ymktv_sun_drinks", array("uniacid" => $_W["uniacid"]));
     $new_drinks = [];
     foreach ($drinks as $key => $value) {
         if (strpos($value['build_id'],',')) {
             $check_build = explode(",", $value['build_id']);    
             if (in_array($building ,$check_build)) {
                  $new_drinks[] =  $value;     
             }   
          }else {
            if ($building == $value['build_id']) {
                $new_drinks[] =  $value;     
           } 
          }         
       }
     echo json_encode($new_drinks);
   }  

   function Printing($order_id,$bid)
    {
      global $_W, $_GPC;
      header("Content-type: text/html; charset=utf-8");
      include "HttpClient.class.php";
      $order = pdo_get("ymktv_sun_roomorder", array("uniacid" => $_W["uniacid"], "id" => $order_id));
      $good = pdo_get("ymktv_sun_goods", array("uniacid" => $_W["uniacid"], "id" => $order["gid"]));
      // $bid =  $_GPC['bid'];
      $order["gname"] = $good["goods_name"];
      $order["room_num"] = $good["room_num"];
      $order["type_id"] = $good["type_id"];
      $order["type_name"] = pdo_getcolumn("ymktv_sun_type", array("id" => $order["type_id"], "uniacid" => $_W["uniacid"]), "type_name");
      $order["user_name"] = pdo_getcolumn("ymktv_sun_user", array("uniacid" => $_W["uniacid"]), "name");
      $order["time"] = date("Y-m-d H:i:s", $order["time"]);
      $order["timeData"] = date("Y-m-d", $order["timeData"] / 1000);
      $order["timeies"] = $order["date_dr"] . $order["timie"] . "-" . $order["date_cr"] . $order["times"];
      if ($bid == 0) {
          $cat_printing = pdo_getall("ymktv_sun_printing", array("uniacid" => $_W["uniacid"],'is_open'=> 1));

          $build_name = pdo_getcolumn("ymktv_sun_system", array("uniacid" => $_W["uniacid"]), "pt_name");


          //以下参数不需要修改


          $orderInfo = "<CB>" . $build_name . "</CB><BR>";
          $orderInfo .= "包厢名称　　　　" . $order["gname"] . "<BR>";
          $orderInfo .= "包厢号　　　　　 　　" . $order["room_num"] . "<BR>";
          $orderInfo .= "支付金额　　　　　 　" . $order["price"] . "<BR>";
          $orderInfo .= "预约时间　　　　" . $order["timeData"] . "<BR>";
          $orderInfo .= "预约时段　　　　" . $order["timeies"] . "<BR>";
          $orderInfo .= "联系号码　　　　　" . $order["mobile"] . "<BR>";
          $orderInfo .= "联系人:　　　　 " . $order["user_name"] . "<BR>";
          $orderInfo .= "备注：　" . $order["remark"] . "<BR>";
          $orderInfo .= "----------------------------------------------<BR>";
          $orderInfo .= "合计：　　　　　　　" . $order["price"] . "元<BR>";
          $orderInfo .= "订单编号：　　" . $order["order_num"] . "<BR>";
          $orderInfo .= "下单时间：　　" . $order["time"] . "<BR>";
          foreach ($cat_printing as $key => $value) {
              if ($value['cat'] == 0) {
                 $this->wp_print($value['sn'], $orderInfo, 1);
              }
          }

          // $this->wp_print(SN2, $orderInfo, 1);
      }else {
            $cat_printing = pdo_getall("ymktv_sun_printing", array("uniacid" => $_W["uniacid"],'is_open'=> 1));
            $build_name = $printing["b_name"];
            $orderInfo = "<CB>" . $build_name . "</CB><BR>";
            $orderInfo .= "包厢名称　　　　" . $order["gname"] . "<BR>";
            $orderInfo .= "包厢号　　　　　 　　" . $order["room_num"] . "<BR>";
            $orderInfo .= "支付金额　　　　　 　" . $order["price"] . "<BR>";
            $orderInfo .= "预约时间　　　　" . $order["timeData"] . "<BR>";
            $orderInfo .= "预约时段　　　　" . $order["timeies"] . "<BR>";
            $orderInfo .= "联系号码　　　　　" . $order["mobile"] . "<BR>";
            $orderInfo .= "联系人:　　　　 " . $order["user_name"] . "<BR>";
            $orderInfo .= "备注：　" . $order["remark"] . "<BR>";
            $orderInfo .= "----------------------------------------------<BR>";
            $orderInfo .= "合计：　　　　　　　" . $order["price"] . "元<BR>";
            $orderInfo .= "订单编号：　　" . $order["order_num"] . "<BR>";
            $orderInfo .= "下单时间：　　" . $order["time"] . "<BR>";
            $orderInfo .= '<QR>http://www.dzist.com</QR>';//把二维码字符串用标签套上即可自动生成二维码
            $orderInfo .= "***  更多惊喜，请关注公众号 ***<BR>";




// ------------------------------------------------------------------------
// 后厨
            // $orderInfo2 = "<CB>" . $build_name . "</CB><BR>";
            // $orderInfo2 .= "包厢名称　　　　" . $order["gname"] . "<BR>";
            // $orderInfo2 .= "包厢号　　　　　 　　" . $order["room_num"] . "<BR>";
            // $orderInfo2 .= "支付金额　　　　　 　" . $order["price"] . "<BR>";
            // $orderInfo2 .= "预约时间　　　　" . $order["timeData"] . "<BR>";
            // $orderInfo2 .= "预约时段　　　　" . $order["timeies"] . "<BR>";
            // $orderInfo2 .= "联系号码　　　　　" . $order["mobile"] . "<BR>";
            // $orderInfo2 .= "联系人:　　　　 " . $order["user_name"] . "<BR>";
            // $orderInfo2 .= "备注：　" . $order["remark"] . "<BR>";
            // $orderInfo2 .= "----------------------------------------------<BR>";
            // $orderInfo2 .= "合计：　　　　　　　" . $order["price"] . "元<BR>";
            // $orderInfo2 .= "订单编号：　　" . $order["order_num"] . "<BR>";
            // $orderInfo2 .= "下单时间：　　" . $order["time"] . "<BR>";
            // $orderInfo2 .= '<QR>http://www.dzist.com</QR>';//把二维码字符串用标签套上即可自动生成二维码
            // $orderInfo2 .= "***  更多惊喜，请关注公众号 ***<BR>";
            foreach ($cat_printing as $key => $value) {
                if ($value['cat'] == 0) {
                   $this->wp_print($value['sn'], $orderInfo, 1);
                }
            }


            // $this->wp_print(SN2, $orderInfo2, 1);
     }
  }



  function DrinkPrinting($order_id, $bid)
  {
      global $_W, $_GPC;
      header("Content-type: text/html; charset=utf-8");
      include "HttpClient.class.php";
      $order = pdo_get("ymktv_sun_order", array("uniacid" => $_W["uniacid"], "id" => $order_id));
      $order["user_name"] = pdo_getcolumn("ymktv_sun_user", array("uniacid" => $_W["uniacid"], "openid" => $order["user_id"]), "name");
      $order["good_name"] =  explode(",", $order["good_name"]);
      $order["good_num"] =   explode(",", $order["good_num"]);
      $order["good_money"] = explode(",", $order["good_money"]);

      if ($bid == 0) {
          $cat_printing = pdo_getall("ymktv_sun_printing", array("uniacid" => $_W["uniacid"],'is_open'=> 1));
          $build_name = pdo_getcolumn("ymktv_sun_system", array("uniacid" => $_W["uniacid"]), "pt_name");

          $blank = array(1 => "　", 2 => "　　", 3 => "　　　", 4 => "　　　　", 5 => "　　　　　", 6 => "　　　　　　", 7 => "　　　　　　");
          $orderInfo = "<CB>" . $build_name . "</CB><BR>";
          $orderInfo .= "名称　　　　　   单价   数量  金额<BR>";
          foreach ($order["good_name"] as $k => $v) {
              foreach ($order["good_num"] as $kk => $vv) {
                  foreach ($order["good_money"] as $kkk => $vvv) {
                      if ($k == $kk && $kk == $kkk) {
                          $orderInfo .= '' . $v . '' . $blank[8 - strlen($v) / 3] . '' . $vvv . '' . $blank[3 - intval(strlen($vvv) / 2)] . '' . $vv . '' . $blank[3 - strlen($vv)] . '' . $vv * $vvv . "<BR>";
                      }
                  }
              }
          }
          $orderInfo .= "--------------------------------------------------<BR>";
          $orderInfo .= "包厢　　　　　　　　　" . $order["address"] . "<BR>";
          $orderInfo .= "联系号码　　　　　" . $order["tel"] . "<BR>";
          $orderInfo .= "联系人:　　　　　　　" . $order["user_name"] . "<BR>";
          $orderInfo .= "备注：　" . $order["remark"] . "<BR>";
          $orderInfo .= "---------------------------------------------------<BR>";
          $orderInfo .= "合计：　　　　　　" . $order["money"] . "元<BR>";
          $orderInfo .= "订单编号:　　　" . $order["order_num"] . "<BR>";
          $orderInfo .= "下单时间:　　　" . $order["pay_time"] . "<BR>";
          $orderInfo .= '<QR>http://www.dzist.com</QR>';//把二维码字符串用标签套上即可自动生成二维码
          $orderInfo .= "***  更多惊喜，请关注公众号 ***<BR>";



          // ----------------------------------------------后厨
          $orderInfo2 = '';
          $orderInfo2 = "<CB>***老六外卖***</CB><BR>";
          $orderInfo2 = "<B><C>***老六外卖***</C></B><BR>";
          $orderInfo2 .= "台号:       " . $order["address"] . "<BR>";
          $orderInfo2 .= "订单编号:   " . $order["order_num"] . "<BR>";
          $orderInfo2 .= "下单时间:   " . $order["pay_time"] . "<BR>";
          $orderInfo2 .= "--------------菜品--------------<BR>";
          foreach ($order["good_name"] as $k => $v) {
              foreach ($order["good_num"] as $kk => $vv) {
                  foreach ($order["good_money"] as $kkk => $vvv) {
                      if ($k == $kk && $kk == $kkk) {
                          $orderInfo2 .= '<L>' . $v . '' .$blank[10 - strlen($v) / 3]. '*' . $vv . ' ' . $vv * $vvv . "</L><BR>";
                      }
                  }
              }
          }
          $orderInfo2 .= "<BOLD>备注:　　　　　 " . $order["remark"] . "</BOLD><BR>";
          $orderInfo2 .= "--------------------------------<BR>";
          $orderInfo2 .= "原价:　　　　　   " . $order["money"] . "元<BR>";
          $orderInfo2 .= "<B><BOLD>实付:    " . $order["money"] . "元</BOLD></B><BR>";
          $orderInfo2 .= "--------------------------------<BR>";
          $orderInfo2 .= "<B><BOLD>地址:" . $order["address"] . "台</BOLD></B><BR>";
          $orderInfo2 .= "<B><BOLD>姓名:" . $order["user_name"] . "</BOLD></B><BR>";
          $orderInfo2 .= "<B><BOLD>电话:" . $order["tel"] . "</BOLD></B><BR>";
          $orderInfo2 .= "--------------------------------<BR>";
          $orderInfo2 .= '<QR>http://www.biu.ltd</QR>';//把二维码字符串用标签套上即可自动生成二维码
          $orderInfo2 .= "<C>*** 更多惊喜，请关注公众号 ***</C><BR>";

          foreach ($cat_printing as $key => $value) {
              if ($value['cat'] == 1) {
                $this->wp_print($value['sn'], $orderInfo2, 1);
              }
              if ($value['cat'] == 0) {
                 $this->wp_print($value['sn'], $orderInfo, 1);
              }
          }

      }else {

        $cat_printing = pdo_getall("ymktv_sun_printing", array("uniacid" => $_W["uniacid"],'is_open'=> 1));
        // $printing = pdo_get("ymktv_sun_printing", array("uniacid" => $_W["uniacid"]));
        // halt($printing);
        $printing = pdo_get("ymktv_sun_building", array("uniacid" => $_W["uniacid"], "id" => $bid));
        $build_name = $printing["b_name"];
        $blank = array(1 => "　　　　　　", 2 => "　　　　　　　", 3 => "　　　　　　　　", 4 => "　　　　　　　　　", 5 => "　　　　　　　　　　", 6 => "　　　　　　　　　　　", 7 => "　　　　　　　　　　　　", 8=>"　　　　　　　　　　　　　", 9=>"　　　　　　　　　　　　　　", 10=>"　　　　　　　　　　　　　　　", 11=>"　　　　　　　　　　　　　　　　");
        $orderInfo = "<CB>***堂食订单***</CB><BR>";
        // $orderInfo = "<B><C>***老六外卖***</C></B><BR>";
        $orderInfo .= "<B>台号：" . $order["address"] . "</B><BR>";
        $orderInfo .= "订单编号：" . $order["order_num"] . "<BR>";
        $orderInfo .= "下单时间：" . $order["pay_time"] . "<BR>";
        $orderInfo .= "--------------菜品--------------<BR>";

        foreach ($order["good_name"] as $k => $v) {
            foreach ($order["good_num"] as $kk => $vv) {
                foreach ($order["good_money"] as $kkk => $vvv) {
                    if ($k == $kk && $kk == $kkk) {
                        // $v= '大事看见回复凯撒符号客服号独守空的撒捡来的顶顶顶顶顶顶顶顶捡来的顶顶顶顶顶顶顶顶的斯科拉';
                        $good_money_all = '' . $v . '' .$blank[10 - strlen($v) / 3]. 'X' . $vv . '  ' . $vv * $vvv.'<BR>';
                        if (strlen($good_money_all) <= 48) {
                            $orderInfo .= $good_money_all ."<BR>";
                         }else {
                              // halt($v);
                              preg_match_all("/[\x{4e00}-\x{9fa5}]+/u",$v,$regs);
                              $s = join('',$regs[0]);//j
                              $s=mb_substr($s,0,80,'utf-8');
                              $two_wz = strlen($v)-strlen($s);
                              // halt($two_wz);
                              if ($two_wz) {
                                $three_wz  = (strlen($s) / 3) * 2;
                                $fill = ($three_wz + $two_wz) % 32 ;
                                $nbsp = '';
                                for ($i=0; $i < $fill ; $i++) {
                                     $nbsp .= ' ';
                                }
                              }else {
                                 // $three_wz  = strlen($s);
                                 $flomoney = strlen($s) % 48;
                                 // halt($flomoney);
                                 $fill = ( 48 - $flomoney) / 3;
                                 // $fill_old = (48 - ($three_wz  % 48)) / 3;
                                 $nbsp = '';
                                 for ($i=0; $i < $fill * 2 ; $i++) {
                                      $nbsp .= ' ';
                                 }
                              }


                              // halt($fill);


                              // halt($fill);

                              $first =  $v  . $nbsp;
                              $nbsp_two = 32  - strlen('X' . $vv . ' ' . $vv * $vvv);
                              $nbsp2 = '';
                              for ($i=0; $i < $nbsp_two ; $i++) {
                                $nbsp2 .= ' ';
                              }
                              // halt($first);
                              $orderInfo .= $first . $nbsp2 . 'X' . $vv . ' ' . $vv * $vvv.'<BR>' ;
                        }

                    }
                }
            }
        }

        $orderInfo .= "<BR>";
        $orderInfo .= "<BOLD>备注：" . $order["remark"] . "</BOLD><BR>";
        $orderInfo .= "--------------------------------<BR>";
        $orderInfo .= "原价：　　　　　　" . $order["money"] . "元<BR>";
        $orderInfo .= "<B>实付：　 " . $order["money"] . "元</B><BR>";
        $orderInfo .= "--------------------------------<BR>";
        $orderInfo .= '<QR>http://www.biu.ltd</QR>';//把二维码字符串用标签套上即可自动生成二维码
        $orderInfo .= "<C>*** 更多惊喜，请关注公众号 ***</C><BR>";

// ----------------------------------------------后厨
        $orderInfo2 = '';
        $orderInfo2 = "<CB>***后厨订单***</CB><BR>";
        // $orderInfo2 = "<B><C>***老六外卖***</C></B><BR>";
        $orderInfo2 .= "<B>台号：" . $order["address"] . "</B><BR>";
        $orderInfo2 .= "订单编号：" . $order["order_num"] . "<BR>";
        $orderInfo2 .= "下单时间：" . $order["pay_time"] . "<BR>";
        $orderInfo2 .= "--------------菜品--------------<BR>";
        foreach ($order["good_name"] as $k => $v) {
            foreach ($order["good_num"] as $kk => $vv) {
                foreach ($order["good_money"] as $kkk => $vvv) {
                    if ($k == $kk && $kk == $kkk) {
                        $orderInfo2 .= '<L>' . $v . '' .$blank[9 - strlen($v) / 3]. 'X' . $vv  . "</L><BR>";
                    }
                }
            }
        }
        $orderInfo2 .= "<BR>";
        $orderInfo2 .= "<BOLD>备注：" . $order["remark"] . "</BOLD><BR>";


        foreach ($cat_printing as $key => $value) {
            if ($value['cat'] == 1) {
              $this->wp_print($value['sn'], $orderInfo2, 1);
            }
            if ($value['cat'] == 0) {
               $this->wp_print($value['sn'], $orderInfo, 1);
            }
        }

        // $this->wp_print(SN2, $orderInfo2, 1);

      }

  }



   function wp_print($printer_sn, $orderInfo, $times)
    {
      $content = array("user" => USER, "stime" => STIME, "sig" => SIG, "apiname" => "Open_printMsg", "sn" => $printer_sn, "content" => $orderInfo, "times" => $times);
      $client = new HttpClient(IP, PORT);
      if (!$client->post(PATH, $content)) {
           echo "error";
       }
      // echo $client->getContent();
    }

    public function doPageSwitchBranch()
    {
        goto cl_CG;
        KGgB7:
        FFvFc:
        goto DEmgU;
        oPZQl:
        $id = $_GPC["id"];
        goto D6JJn;
        cl_CG:
        global $_W, $_GPC;
        goto oPZQl;
        yQb1b:
        $res = pdo_insert("ymktv_sun_build_switch", $data);
        goto KGgB7;
        DEmgU:
        echo json_encode($res);
        goto jxyIW;
        OOwMe:
        goto FFvFc;
        goto zMLU8;
        UdtfO:
        $res = pdo_update("ymktv_sun_build_switch", array("build_id" => $id), array("uniacid" => $_W["uniacid"], "openid" => $openid));
        goto Vgf1n;
        C__zv:
        $res = 1;
        goto bzMgE;
        D6JJn:
        $openid = $_GPC["openid"];
        goto AeVw7;
        zMLU8:
        Up57p:
        goto yQb1b;
        AeVw7:
        $build_switch = pdo_get("ymktv_sun_build_switch", array("uniacid" => $_W["uniacid"], "openid" => $openid));
        goto yuJCy;
        OMbhe:
        if (!$build_switch) {
            goto Up57p;
        }
        goto UdtfO;
        yuJCy:
        $data = array("uniacid" => $_W["uniacid"], "build_id" => $id, "openid" => $openid);
        goto OMbhe;
        bzMgE:
        U7Thw:
        goto OOwMe;
        Vgf1n:
        if (!($id == $build_switch["build_id"])) {
            goto U7Thw;
        }
        goto C__zv;
        jxyIW:
    }
    public function doPageCurrentBranch()
    {
        goto pDYSF;
        RuAjo:
        foreach ($branch as $k => $v) {
            $branch[$k]["distance"] = round($this->getdistance($lat, $lng, $v["lat"], $v["lng"]) / 1000, 2);
            F8MbB:
        }
        goto I5tJs;
        vGXcS:
        X0cPm:
        goto Ak1HJ;
        KEWB6:
        foreach ($branch as $k => $v) {
            $dis[$k] = $v["distance"];
            qm5xN:
        }
        goto Log8x;
        s6ueJ:
        $data = $branch[0];
        goto iySSh;
        NUIpE:
        rj9Xo:
        goto RuAjo;
        pRqMD:
        $lng = $_GPC["longitude"];
        goto c0Pf2;
        FLMg_:
        $isSwitch = $_GPC["isSwitch"];
        goto K1LKg;
        KLJGZ:
        goto Ee5j2;
        goto WStgp;
        pDYSF:
        global $_W, $_GPC;
        goto x0jOm;
        iySSh:
        goto pEAV_;
        goto vGXcS;
        Ak1HJ:
        $build = pdo_get("ymktv_sun_build_switch", array("uniacid" => $_W["uniacid"], "openid" => $openid));
        goto baMyl;
        Log8x:
        JSYQ_:
        goto hvqIM;
        x0jOm:
        $openid = $_GPC["openid"];
        goto FLMg_;
        TPx8L:
        $data["lng"] = (float) $data["lng"];
        goto mmkTZ;
        hvqIM:
        array_multisort($dis, SORT_ASC, $branch);
        goto s6ueJ;
        K1LKg:
        $lat = $_GPC["latitude"];
        goto pRqMD;
        CNCIy:
        $data["lat"] = explode(",", $data["longitude"])[1];
        goto cG2OW;
        hRnT_:
        $data = pdo_get("ymktv_sun_building", array("uniacid" => $_W["uniacid"]));
        goto KLJGZ;
        mmkTZ:
        echo json_encode($data);
        goto EirZM;
        c0Pf2:
        if ($isSwitch == 1) {
            goto X0cPm;
        }
        goto CA3lx;
        PLk4U:
        $data = pdo_get("ymktv_sun_building", array("uniacid" => $_W["uniacid"], "id" => $build["build_id"]));
        goto E1w8m;
        Y6orm:
        $data["lat"] = (float) $data["lat"];
        goto TPx8L;
        E1w8m:
        Ee5j2:
        goto CNCIy;
        cG2OW:
        $data["lng"] = explode(",", $data["longitude"])[0];
        goto nwiCH;
        nwiCH:
        pEAV_:
        goto Y6orm;
        I5tJs:
        TUekW:
        goto KEWB6;
        baMyl:
        if ($build) {
            goto omnej;
        }
        goto hRnT_;
        aU8K1:
        foreach ($branch as $k => $v) {
            goto ctsq6;
            ctsq6:
            $branch[$k]["lat"] = explode(",", $v["longitude"])[1];
            goto sPU3h;
            sPU3h:
            $branch[$k]["lng"] = explode(",", $v["longitude"])[0];
            goto hLYrq;
            hLYrq:
            Vl_9y:
            goto LMFDC;
            LMFDC:
        }
        goto NUIpE;
        CA3lx:
        $branch = pdo_getall("ymktv_sun_building", array("uniacid" => $_W["uniacid"]));
        goto aU8K1;
        WStgp:
        omnej:
        goto PLk4U;
        EirZM:
    }
	
    public function doPageRoomOrderDetails()
    {
        goto oTGy8;
        eg51o:
        $order["timeData"] = date("Y-m-d", $order["timeData"] / 1000);
        goto RlFGG;
        oTGy8:
        global $_GPC, $_W;
        goto Oxkj5;
        IHpiT:
        $id = $_GPC["id"];
        goto AJalG;
        PHtYJ:
        if (!empty($order["integral"])) {
            goto CRsN4;
        }
        goto SeHWK;
        cwg3A:
        CRsN4:
        goto vcYy2;
        SeHWK:
        $order["integral"] = 0;
        goto cwg3A;
        Oxkj5:
        $uniacid = $_W["uniacid"];
        goto IHpiT;
        vcYy2:
        echo json_encode($order);
        goto SiXWM;
        k166k:
        $order["b_name"] = pdo_getcolumn("ymktv_sun_building", array("uniacid" => $_W["uniacid"], "id" => $order["build_id"]), "b_name");
        goto eg51o;
        sCjs3:
        $order["times"] = $order["date_dr"] . $order["timie"] . $order["date_cr"] . $order["times"];
        goto PHtYJ;
        AJalG:
        $sql = " select r.*,g.goods_name,g.big_thumbnail from " . tablename("ymktv_sun_roomorder") . " r join " . tablename("ymktv_sun_goods") . " g on r.gid=g.id where r.uniacid={$uniacid} and r.id={$id}";
        goto p8Zol;
        p8Zol:
        $order = pdo_fetch($sql);
        goto k166k;
        RlFGG:
        $order["time"] = date("Y-m-d H:i:s", $order["time"]);
        goto sCjs3;
        SiXWM:
    }
    public function doPageDrinkOrderDetails()
    {
        goto D0iBY;
        ZP3e1:
        echo json_encode($order);
        goto WjfZG;
        s8Rlg:
        Zk7Kn:
        goto ZP3e1;
        D0iBY:
        global $_GPC, $_W;
        goto bILyG;
        i_kKP:
        $order["remark"] = '';
        goto FJN1l;
        u5yl1:
        if (!empty($order["integral"])) {
            goto Zk7Kn;
        }
        goto uC7JD;
        YLAQF:
        if (!empty($order["remark"])) {
            goto QAwgM;
        }
        goto i_kKP;
        UldJ7:
        $order["b_name"] = pdo_getcolumn("ymktv_sun_building", array("uniacid" => $_W["uniacid"], "id" => $order["build_id"]), "b_name");
        goto YLAQF;
        vhN0K:
        $order = pdo_get("ymktv_sun_order", array("uniacid" => $_W["uniacid"], "id" => $id));
        goto M9yXj;
        OiZBV:
        $order["good_id"] = explode(",", $order["good_id"]);
        goto UldJ7;
        FJN1l:
        QAwgM:
        goto u5yl1;
        M9yXj:
        $order["good_imgs"] = explode(",", $order["good_imgs"]);
        goto dVAq3;
        uC7JD:
        $order["integral"] = 0;
        goto s8Rlg;
        Kj_tI:
        $order["good_name"] = explode(",", $order["good_name"]);
        goto AynZN;
        bILyG:
        $id = $_GPC["id"];
        goto vhN0K;
        dVAq3:
        $order["good_num"] = explode(",", $order["good_num"]);
        goto Kj_tI;
        AynZN:
        $order["good_money"] = explode(",", $order["good_money"]);
        goto OiZBV;
        WjfZG:
    }
    public function doPageKeepwineOrder()
    {
        goto dss05;
        mkVz8:
        $keep["addtime"] = date("Y-m-d H:i:s", $keep["addtime"]);
        goto qw_ii;
        V179v:
        $id = $_GPC["id"];
        goto HwuMv;
        dss05:
        global $_GPC, $_W;
        goto V179v;
        HwuMv:
        $keep = pdo_get("ymktv_sun_keepwine", array("uniacid" => $_W["uniacid"], "id" => $id));
        goto N61bs;
        N61bs:
        $keep["b_name"] = pdo_getcolumn("ymktv_sun_building", array("uniacid" => $_W["uniacid"], "id" => $keep["build_id"]), "b_name");
        goto mkVz8;
        qw_ii:
        echo json_encode($keep);
        goto Fx0xW;
        Fx0xW:
    }
    public function doPageGetOrderInfo()
    {
        goto Chb1L;
        Fqvxu:
        n47uF:
        goto EbtI0;
        aGx1v:
        $order["ordertype"] = $ordertype;
        goto ZBLW4;
        n3oqh:
        QJQwU:
        goto Vefny;
        zk4x1:
        $order = pdo_get("ymktv_sun_order", array("uniacid" => $_W["uniacid"], "id" => $id, "build_id" => $bid, "sid" => $sid));
        goto Refmk;
        PIBZW:
        $sid = 0;
        goto tiBtd;
        k2EWe:
        if ($sid) {
            goto fyZPd;
        }
        goto qIWx5;
        fnMwQ:
        goto kfFHu;
        Chb1L:
        global $_GPC, $_W;
        goto b3d5q;
        v7yQ9:
        $order["addtime"] = date("Y-m-d H:i:s", $order["addtime"]);
        goto aGx1v;
        XXrEy:
        $where = " and r.sid = " . $sid . '';
        goto B54ag;
        sxChO:
        if (!empty($order["integral"])) {
            goto uTXqP;
        }
        goto ah7vZ;
        rJ03o:
        $order = pdo_get("ymktv_sun_order", array("uniacid" => $_W["uniacid"], "id" => $id, "build_id" => $bid));
        goto UGnuZ;
        vO6d9:
        $order["good_imgs"] = explode(",", $order["good_imgs"]);
        goto xEBCJ;
        Tyzgc:
        Oxv6k:
        goto MgJnY;
        y8405:
        $order = pdo_fetch($sql);
        goto PUEEj;
        Vi0nw:
        o21ax:
        goto zk4x1;
        hxhqt:
        goto XdOa2;
        V6Mgv:
        $order["remark"] = '';
        goto KIl3D;
        opW8k:
        $bid = $bid["b_id"];
        goto MLOeE;
        qIWx5:
        $bid = $_GPC["bid"];
        goto hxhqt;
        xEBCJ:
        $order["good_name"] = explode(",", $order["good_name"]);
        goto joS7W;
        Vefny:
        $order = pdo_get("ymktv_sun_keepwine", array("uniacid" => $_W["uniacid"], "id" => $id, "build_id" => $bid));
        goto i6YA0;
        oROIq:
        goto n3oqh;
        nfTZ5:
        c0wy_:
        goto lfNsJ;
        MgJnY:
        $sid = $_GPC["sid"];
        goto k2EWe;
        b3d5q:
        $ordertype = $_GPC["ordertype"];
        goto fCnZh;
        or1Xv:
        if (!empty($order["integral"])) {
            goto qyQ0z;
        }
        goto Kuj9p;
        EbtI0:
        $bid = pdo_get("ymktv_sun_servies", array("uniacid" => $_W["uniacid"], "sid" => $sid));
        goto LDkp4;
        svp9S:
        $order["good_name"] = explode(",", $order["winename"]);
        goto v7yQ9;
        AnH3e:
        $bid = $_GPC["bid"];
        goto gQ7xj;
        LDkp4:
        $bid = $bid["b_id"];
        goto XXrEy;
        joS7W:
        $order["b_name"] = pdo_getcolumn("ymktv_sun_building", array("uniacid" => $_W["uniacid"], "id" => $order["build_id"]), "b_name");
        goto XDR1J;
        Kuj9p:
        $order["integral"] = 0;
        goto V9bwR;
        UGnuZ:
        goto vNcA2;
        goto Vi0nw;
        IZEeD:
        VSdiC:
        goto QbwYs;
        fCnZh:
        $id = $_GPC["id"];
        goto JP4dB;
        FOVl8:
        $sid = $_GPC["sid"];
        goto qwLfR;
        QNkvw:
        $bid = pdo_get("ymktv_sun_servies", array("uniacid" => $_W["uniacid"], "sid" => $sid));
        goto opW8k;
        xijEJ:
        $order["timeData"] = date("Y-m-d", $order["timeData"] / 1000);
        goto pOLOr;
        prFVe:
        fyZPd:
        goto QNkvw;
        Refmk:
        vNcA2:
        goto vO6d9;
        gQ7xj:
        goto N8uLe;
        bkiti:
        $bid = $bid["b_id"];
        goto oROIq;
        N8uLe:
        goto QJQwU;
        goto nfTZ5;
        O2HbL:
        $order["good_imgs"] = explode(",", $order["big_thumbnail"]);
        goto UEDlX;
        Nds8g:
        if ($ordertype == 2) {
            goto Oxv6k;
        }
        goto QmiiW;
        kfFHu:
        goto Eyzu8;
        goto Fqvxu;
        JP4dB:
        if ($ordertype == 1) {
            goto LDKNk;
        }
        goto Nds8g;
        B54ag:
        Eyzu8:
        goto Q0Ze0;
        VtCrN:
        $order["good_imgs"] = explode(",", $order["imgsrc"]);
        goto svp9S;
        XDR1J:
        $order["ordertype"] = $ordertype;
        goto S3fOU;
        S3fOU:
        if (!empty($order["remark"])) {
            goto MF89K;
        }
        goto V6Mgv;
        UEDlX:
        $order["good_name"] = explode(",", $order["goods_name"]);
        goto nKfeh;
        Pt7Ok:
        Swbhe:
        goto d__pI;
        pOLOr:
        $order["time"] = date("Y-m-d H:i:s", $order["time"]);
        goto upzaw;
        vNP46:
        if ($sid) {
            goto c0wy_;
        }
        goto AnH3e;
        kJwZC:
        $sql = " select r.*,g.goods_name,g.big_thumbnail from " . tablename("ymktv_sun_roomorder") . " r join " . tablename("ymktv_sun_goods") . " g on r.gid=g.id where r.uniacid={$uniacid} and r.id={$id} and r.build_id={$bid}" . $where;
        goto y8405;
        PUEEj:
        $order["b_name"] = pdo_getcolumn("ymktv_sun_building", array("uniacid" => $_W["uniacid"], "id" => $order["build_id"]), "b_name");
        goto xijEJ;
        tiBtd:
        MWKF4:
        goto Pt7Ok;
        upzaw:
        $order["times"] = $order["date_dr"] . $order["timie"] . $order["date_cr"] . $order["times"];
        goto O2HbL;
        sarmd:
        if (!($res[0]["sid"] == $sid)) {
            goto MWKF4;
        }
        goto PIBZW;
        p64nk:
        goto VSdiC;
        goto Tyzgc;
        GNT9c:
        uTXqP:
        goto p64nk;
        V9bwR:
        qyQ0z:
        goto IZEeD;
        oa4Ep:
        LDKNk:
        goto FOVl8;
        ZBLW4:
        goto VSdiC;
        goto oa4Ep;
        lfNsJ:
        $bid = pdo_get("ymktv_sun_servies", array("uniacid" => $_W["uniacid"], "sid" => $sid));
        goto bkiti;
        qwLfR:
        if ($sid) {
            goto n47uF;
        }
        goto MVgjz;
        MLOeE:
        $res = pdo_getall("ymktv_sun_servies", array("uniacid" => $_W["uniacid"], "b_id" => $bid), array(), '', "sid ASC");
        goto sarmd;
        XdOa2:
        goto Swbhe;
        goto prFVe;
        nKfeh:
        $order["ordertype"] = $ordertype;
        goto sxChO;
        d__pI:
        if (!empty($sid)) {
            goto o21ax;
        }
        goto rJ03o;
        QbwYs:
        echo json_encode($order);
        goto Z27su;
        KIl3D:
        MF89K:
        goto or1Xv;
        QmiiW:
        $sid = $_GPC["sid"];
        goto vNP46;
        MVgjz:
        $bid = $_GPC["bid"];
        goto fnMwQ;
        ah7vZ:
        $order["integral"] = 0;
        goto GNT9c;
        Q0Ze0:
        $uniacid = $_W["uniacid"];
        goto kJwZC;
        i6YA0:
        $order["b_name"] = pdo_getcolumn("ymktv_sun_building", array("uniacid" => $_W["uniacid"], "id" => $order["build_id"]), "b_name");
        goto VtCrN;
        Z27su:
    }
    public function doPageSaoBrandOrder()
    {
        goto e5qCI;
        uXVDE:
        $res = pdo_update("ymktv_sun_roomorder", array("status" => 1), array("uniacid" => $_W["uniacid"], "id" => $id, "build_id" => $bid));
        goto If8r4;
        HTZzh:
        if ($ordertype == 2) {
            goto w4wEy;
        }
        goto T8CqQ;
        KnXVE:
        Q5UCc:
        goto MDBfu;
        j2SkF:
        echo json_encode($res);
        goto qSUPT;
        CpB1w:
        $bid = pdo_get("ymktv_sun_servies", array("uniacid" => $_W["uniacid"], "sid" => $sid));
        goto luWFV;
        U9P2w:
        $distribution->ordertype = 2;
        goto FcBeX;
        zY4BS:
        goto yKwwd;
        goto LmHIr;
        LmHIr:
        mo_cU:
        goto CpB1w;
        WnkLz:
        $distribution->order_id = $_GPC["id"];
        goto OMztX;
        FcBeX:
        $distribution->settlecommission();
        goto fuHI9;
        G9Vwj:
        include_once IA_ROOT . "/addons/ymktv_sun/inc/func/distribution.php";
        goto NMuFu;
        MDBfu:
        goto XKnrn;
        goto vqJpv;
        gxxjz:
        goto KnXVE;
        L3siN:
        $id = $_GPC["id"];
        goto VpTb2;
        vbAHh:
        if ($ordertype == 1) {
            goto VxwPF;
        }
        goto HTZzh;
        e5qCI:
        global $_GPC, $_W;
        goto jRfu3;
        EopF7:
        $bid = $_GPC["bid"];
        goto tboac;
        tboac:
        goto zY4BS;
        DaYvd:
        $distribution = new Distribution();
        goto d0J7w;
        T8CqQ:
        $res = pdo_update("ymktv_sun_keepwine", array("status" => 2, "exttime" => date("Y-m-d H:i:s", time())), array("uniacid" => $_W["uniacid"], "id" => $id, "build_id" => $bid, "status" => 1));
        goto RaAiM;
        KLdZz:
        $distribution->settlecommission();
        goto gxxjz;
        OMztX:
        $distribution->ordertype = 1;
        goto KLdZz;
        If8r4:
        if (!$res) {
            goto Q5UCc;
        }
        goto G9Vwj;
        KZ59F:
        XKnrn:
        goto j2SkF;
        NMuFu:
        $distribution = new Distribution();
        goto WnkLz;
        E94TL:
        pddjz:
        goto KZ59F;
        hIkNI:
        VxwPF:
        goto uXVDE;
        V9RNz:
        yKwwd:
        goto vbAHh;
        fuHI9:
        goto E94TL;
        v0YKH:
        goto V9RNz;
        vqJpv:
        w4wEy:
        goto T29cE;
        jRfu3:
        $ordertype = $_GPC["ordertype"];
        goto L3siN;
        luWFV:
        $bid = $bid["b_id"];
        goto v0YKH;
        VpTb2:
        $sid = $_GPC["sid"];
        goto O8Dfq;
        O8Dfq:
        if ($sid) {
            goto mo_cU;
        }
        goto EopF7;
        d0J7w:
        $distribution->order_id = $_GPC["id"];
        goto U9P2w;
        T29cE:
        $res = pdo_update("ymktv_sun_order", array("status" => 1), array("uniacid" => $_W["uniacid"], "id" => $id, "build_id" => $bid));
        goto vIk_c;
        htuez:
        include_once IA_ROOT . "/addons/ymktv_sun/inc/func/distribution.php";
        goto DaYvd;
        vIk_c:
        if (!$res) {
            goto pddjz;
        }
        goto htuez;
        RaAiM:
        goto XKnrn;
        goto hIkNI;
        qSUPT:
    }
    public function doPagedrinkbalance()
    {
        goto P0SdK;
        iwgsg:
        $drink_open = pdo_getcolumn("ymktv_sun_system", array("uniacid" => $_W["uniacid"]), "drink_open");
        goto j_cvB;
        P0SdK:
        global $_W;
        goto iwgsg;
        j_cvB:
        echo json_encode($drink_open);
        goto hXYnm;
        hXYnm:
    }
    public function dopageposter()
    {
        goto ER7IO;
        trFMt:
        $sql = " select poster_imgs,poster_font from " . tablename("ymktv_sun_system") . " where uniacid=" . $_W["uniacid"];
        goto JbjMH;
        pmp8e:
        echo json_encode($poster);
        goto iLzsm;
        ER7IO:
        global $_W;
        goto trFMt;
        JbjMH:
        $poster = pdo_fetch($sql);
        goto pmp8e;
        iLzsm:
    }
    public function getaccess_token()
    {
        goto sWyGW;
        o4QTc:
        curl_close($ch);
        goto Iorh5;
        RnVqF:
        $appid = $res["appid"];
        goto MtOYd;
        xrdry:
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        goto KSU2E;
        nblg0:
        curl_setopt($ch, CURLOPT_URL, $url);
        goto vPP4m;
        Iorh5:
        $data = json_decode($data, true);
        goto zprf4;
        KSU2E:
        $data = curl_exec($ch);
        goto o4QTc;
        vPP4m:
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        goto xrdry;
        MtOYd:
        $secret = $res["appsecret"];
        goto FF_U1;
        RyVbJ:
        $ch = curl_init();
        goto nblg0;
        MQEzi:
        $res = pdo_get("ymktv_sun_system", array("uniacid" => $_W["uniacid"]));
        goto RnVqF;
        sWyGW:
        global $_W, $_GPC;
        goto MQEzi;
        FF_U1:
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=" . $appid . "&secret=" . $secret . '';
        goto RyVbJ;
        zprf4:
        return $data["access_token"];
        goto WcYgn;
        WcYgn:
    }
    public function doPageGetwxCode()
    {
        goto cFCpW;
        VM1ik:
        $data["auto_color"] = $auto_color;
        goto D9IAr;
        j2X1O:
        return $this->result(1, "场景值不合法", array());
        goto qtsOn;
        V_uI2:
        $data["scene"] = $scene;
        goto ciuQ4;
        gLC7s:
        $return = $this->request_post($url, $json_data);
        goto uKeMQ;
        W2WS0:
        $json_data = json_encode($data);
        goto gLC7s;
        cFCpW:
        global $_W, $_GPC;
        goto gw1TC;
        wR4vw:
        $uniacid = $_W["uniacid"];
        goto WDhhC;
        fRB0z:
        $data["width"] = $width;
        goto VM1ik;
        gw1TC:
        $access_token = $this->getaccess_token();
        goto shdSk;
        SFp3F:
        $is_hyaline = $_GPC["is_hyaline"] ? $_GPC["is_hyaline"] : false;
        goto wR4vw;
        ims09:
        echo json_encode($imgname);
        goto UsDuJ;
        c523i:
        if (preg_match("/[0-9a-zA-Z\\!\\#\\\$\\&'\\(\\)\\*\\+\\,\\/\\:\\;\\=\\?\\@\\-\\.\\_\\~]{1,32}/", $scene)) {
            goto gJbbJ;
        }
        goto j2X1O;
        pvniV:
        $auto_color = $_GPC["auto_color"] ? $_GPC["auto_color"] : false;
        goto F6iAd;
        shdSk:
        $scene = $_GPC["scene"];
        goto c523i;
        OxJd8:
        $data["is_hyaline"] = $is_hyaline;
        goto W2WS0;
        xeO7h:
        $width = $_GPC["width"] ? $_GPC["width"] : 430;
        goto pvniV;
        RADNQ:
        $page = $_GPC["page"];
        goto xeO7h;
        rJUY6:
        $data = array();
        goto V_uI2;
        uKeMQ:
        $imgname = time() . rand(10000, 99999) . ".jpg";
        goto hus0i;
        F6iAd:
        $line_color = $_GPC["line_color"] ? $_GPC["line_color"] : array("r" => 0, "g" => 0, "b" => 0);
        goto SFp3F;
        ciuQ4:
        $data["page"] = $page;
        goto fRB0z;
        D9IAr:
        $data["line_color"] = $line_color;
        goto OxJd8;
        hus0i:
        file_put_contents("../attachment/" . $imgname, $return);
        goto ims09;
        WDhhC:
        $url = "https://api.weixin.qq.com/wxa/getwxacodeunlimit?access_token=" . $access_token;
        goto rJUY6;
        qtsOn:
        gJbbJ:
        goto RADNQ;
        UsDuJ:
    }
    public function doPageDelwxCode()
    {
        goto Pbf3v;
        bjFK6:
        goto CgMry;
        goto kuhJK;
        p04wD:
        if (file_exists($filename)) {
            goto y3yJO;
        }
        goto HeDj6;
        l23Xz:
        $imgurl = $_GPC["imgurl"];
        goto Qt7c0;
        Pbf3v:
        global $_W, $_GPC;
        goto l23Xz;
        Qt7c0:
        $filename = "../attachment/" . $imgurl;
        goto p04wD;
        TEbty:
        CgMry:
        goto HCqKV;
        kuhJK:
        y3yJO:
        goto i6aI7;
        yQONl:
        unlink($filename);
        goto TEbty;
        i6aI7:
        $info = "删除成功";
        goto yQONl;
        HCqKV:
        echo $info;
        goto AMauS;
        HeDj6:
        $info = "没找到:" . $filename;
        goto bjFK6;
        AMauS:
    }
    public function request_post($url, $data)
    {
        goto AG5hM;
        XkYKB:
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        goto Bxr9k;
        loB7g:
        aUsKM:
        goto riIz2;
        IAfFX:
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        goto D9aFG;
        tVAWf:
        if ($error) {
            goto KfTO4;
        }
        goto MLl0u;
        MLl0u:
        return $tmpInfo;
        goto m96NQ;
        unA4N:
        return false;
        goto loB7g;
        m96NQ:
        goto aUsKM;
        goto wON_e;
        Bxr9k:
        $tmpInfo = curl_exec($ch);
        goto pMZ5m;
        wON_e:
        KfTO4:
        goto unA4N;
        AG5hM:
        $ch = curl_init();
        goto VVErJ;
        HxxuA:
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        goto IAfFX;
        pMZ5m:
        $error = curl_errno($ch);
        goto xkbqU;
        xkbqU:
        curl_close($ch);
        goto tVAWf;
        VVErJ:
        curl_setopt($ch, CURLOPT_URL, $url);
        goto HxxuA;
        D9aFG:
        curl_setopt($ch, CURLOPT_POST, 1);
        goto XkYKB;
        riIz2:
    }
    public function doPagePlugin()
    {
        goto znBwg;
        z4lQf:
        goto CoX1b;
        goto dGB1r;
        b7OrY:
        goto TrTZI;
        goto XH_ZD;
        d2AJQ:
        if (pdo_tableexists("ymktv_sun_distribution_set")) {
            goto l8nGG;
        }
        goto CQ0hn;
        l9GGx:
        $set = pdo_get("ymktv_sun_distribution_set", array("uniacid" => $uniacid));
        goto NVzwT;
        XH_ZD:
        l8nGG:
        goto l9GGx;
        HI8tH:
        bNCoF:
        goto B3UiM;
        NVzwT:
        if ($set) {
            goto u0oA9;
        }
        goto lp60L;
        dGB1r:
        u0oA9:
        goto SRnTj;
        BjWjJ:
        if ($type == 1) {
            goto goAQC;
        }
        goto tjVCv;
        jeE5q:
        CoX1b:
        goto crrFw;
        B3UiM:
        echo json_encode($set);
        goto RQ25l;
        znBwg:
        global $_W, $_GPC;
        goto xpGsQ;
        rxI4o:
        $uniacid = $_W["uniacid"];
        goto BjWjJ;
        CQ0hn:
        echo 2;
        goto b7OrY;
        RQ25l:
        r81Al:
        goto jeE5q;
        xpGsQ:
        $type = intval($_GPC["type"]);
        goto rxI4o;
        A0kY8:
        echo 2;
        goto PjVCw;
        SRnTj:
        if ($set["status"] > 0) {
            goto bNCoF;
        }
        goto A0kY8;
        crrFw:
        TrTZI:
        goto iM7f4;
        iFxoK:
        goto t13gD;
        goto OTp6M;
        PjVCw:
        goto r81Al;
        goto HI8tH;
        iM7f4:
        t13gD:
        goto ACQtJ;
        OTp6M:
        goAQC:
        goto d2AJQ;
        lp60L:
        echo 2;
        goto z4lQf;
        tjVCv:
        echo 2;
        goto iFxoK;
        ACQtJ:
    }
	//扫码验证
	public function doPageJianyan(){
		global $_GPC, $_W;
		$sql = 'SELECT * FROM ims_ymktv_sun_goods where room_num =\''.$_GPC['rid'].'\' AND build_id like \'%'.$_GPC['bid'].'\'';
		$res = pdo_fetchall($sql);
		if($res){
			$data['code'] = 1;
		}else{
			$data['code'] = 0;
		};
		echo json_encode($data);
	}
	//随机10个菜
	public function doPageSuiji(){
		global $_GPC, $_W;
		$build_id = $_GPC['bid'];
		$sql = 'select * from ims_ymktv_sun_drinks where build_id = '.$build_id.' ORDER BY RAND() limit 10';
		$data = pdo_fetchall($sql);
		echo json_encode($data);
	}
	//统计菜品排行
	public function doPageStatistics(){
		global $_GPC, $_W;
		$build_id = $_GPC['bid'];
		$sql = 'select count(id) as tongji,good_name from ims_ymktv_sun_order where build_id = '.$build_id.' GROUP BY good_id ORDER BY tongji DESC';
		$data = pdo_fetchall($sql);
		echo json_encode($data);
	}
	//点餐页轮播图（商品id）
	public function doPageDrinksbanner(){
		global $_GPC, $_W;
		$sql = 'select * from ims_ymktv_sun_menubanner order by sort DESC';
		$data = pdo_fetchall($sql);
		echo json_encode($data);
	}
	//公告配置（1开启 0关闭）
	public function doPageNotice(){
		global $_GPC, $_W;
		$sql = 'SELECT * FROM ims_ymktv_sum_notice';
		$data = pdo_fetch($sql);
		echo json_encode($data);	
	}
	
	public function doPageShuiji(){
		global $_GPC, $_W;
		$sql = 'SELECT d.*,COUNT(o.id)+buynum as tongji FROM ims_ymktv_sun_drinks as d LEFT JOIN ims_ymktv_sun_order as o on d.id = o.good_id GROUP BY d.id ORDER BY tongji DESC LIMIT 10';
		$data = pdo_fetchall($sql);
		echo json_encode($data);	
		
	}

}
