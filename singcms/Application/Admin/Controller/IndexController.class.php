<?php
/**
 * 后台Index相关
 */
namespace Admin\Controller;

use Think\Controller;

class IndexController extends Controller
{

    public function index()
    {
        if ($_SESSION['adminUser']) {
            $adminUser = $_SESSION['adminUser'];
            $user_true = D('user_true');
            $user_ture_res = $user_true->select();
            $_SESSION['user_ture_res'] = $user_ture_res;
            $this->assign('username', $adminUser['username']);
            $this->assign('user_ture_res', $user_ture_res);
            $this->display();
        } else {
            $this->display(T("Login/index"));
        }
    }

    public function main()
    {
        $this->display();
    }

    public function export_excel()
    {
        import("Org.Util.PHPExcel");//引入PHPExcel
        import("Org.Util.PHPExcel.Writer.Excel5");
        import("Org.Util.PHPExcel.IOFactory.php");
        $user_ture_res = $_SESSION['user_ture_res'];
        $objPHPExcel = new \PHPExcel();//实例化PHPExcel类， 等同于在桌面上新建一个excel
        $objSheet = $objPHPExcel->getActiveSheet();//获取当前活动sheet
        $objSheet->getDefaultStyle()->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER)->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);//设置excel文件默认水平垂直方向居中
        $objSheet->setTitle("用户信息列表");//给当前活动sheet起个名称
        $objSheet->setCellValue("A1", "ID")->setCellValue("B1", "姓名")->setCellValue("C1", "学院")->setCellValue("D1", "学校")->setCellValue("E1", "专业")->setCellValue("F1", "支付宝")->setCellValue("G1", "支付宝昵称")->setCellValue("H1", "手机号码")->setCellValue("I1", "性别");//填充数据
        $j = 2;
        foreach ($user_ture_res as $key => $val) {
            $objSheet->setCellValue("A" . $j, $val['id'])->setCellValue("B" . $j, $val['name'])->setCellValue("C" . $j, $val['academy'] )->setCellValue("D" . $j, $val['school'] )->setCellValue("E" . $j, $val['profession'])->setCellValue("F" . $j, $val['alipay'])->setCellValue("G" . $j, $val['alipaynickname'])->setCellValue("H" . $j, $val['tel'])->setCellValue("I" . $j, $val['truesex']);
            $j++;
        }
        $objSheet->getColumnDimension('F')->setAutoSize(true);
        $objSheet->getColumnDimension('H')->setAutoSize(true);
        $objSheet->getColumnDimension('C')->setWidth(30);
        $objSheet->getColumnDimension('D')->setWidth(30);
        $objSheet->getColumnDimension('E')->setWidth(30);
        $objSheet->getColumnDimension('E')->setWidth(30);
        $objSheet->getColumnDimension('G')->setWidth(20);
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');//生成excel文件
        $this->browser_export('Excel5', '鹰巢服务已录入信息用户信息表.xls');//输出到浏览器
        $objWriter->save("php://output");
    }

    function browser_export($type, $filename)
    {
        if ($type == "Excel5") {
            header('Content-Type: application/vnd.ms-excel');//告诉浏览器将要输出excel03文件
        } else {
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');//告诉浏览器数据excel07文件
        }
        header('Content-Disposition: attachment;filename="' . $filename . '"');//告诉浏览器将输出文件的名称
        header('Cache-Control: max-age=0');//禁止缓存
    }
}