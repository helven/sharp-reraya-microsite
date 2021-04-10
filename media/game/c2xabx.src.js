abx_locked  = false;
function abx(score)
{
    if(!abx_locked)
    {
        abx_locked = true;

        randomstr   = md5(Math.floor(Math.random() * 1257) * Math.floor(Math.random() * 10));

        document.cookie = '_m_h5_tk=' + (md5(Math.floor(Math.random() * 1257) * Math.floor(Math.random() * 10)) + "=.%*&^@" + Math.floor(Math.random() * 7) +  Math.floor(Math.random() * 10)).shuffle();
        document.cookie = 'cto_axid=' + (md5(Math.floor(Math.random() * 2452) * Math.floor(Math.random() * 10)) + "=.[}FE]").shuffle();
        document.cookie = ' xlly_s=' + (md5(Math.floor(Math.random() * 88983) * Math.floor(Math.random() * 10)) + "=.%?>J").shuffle();
        document.cookie = 'ev_sync_bk=' + md5(Math.floor(Math.random() * 3547) * Math.floor(Math.random() * 10));
        document.cookie = '_tb_token_=' + Math.floor(Math.random() * 20) +  Math.floor(Math.random() * 7);
        document.cookie = 'lzd_click_id=' + Math.floor(Math.random() * 50) +  Math.floor(Math.random() * 9);
        document.cookie = ' everest_g_v2=' + ('_xF[B_#E').shuffle() + (Math.floor(Math.random() * 20) +  Math.floor(Math.random() * 10) + "=_%").shuffle();
        document.cookie = 'miidlaz=' + Math.floor(Math.random() * 20) +  Math.floor(Math.random() * 10);
        document.cookie = '_leksxia_x2=' + ('_xF[B_#E').shuffle().replace('[', score);

        parent.postMessage({
            source: 'sharp',
            action: 'game_end',
            score: score
        }, '*')

        setTimeout(function(){
            abx_locked = false;
        }, 1000);
    }
}