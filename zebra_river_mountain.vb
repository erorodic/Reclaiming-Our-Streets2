Module ReclaimingOurStreets
    Private streetNames() As String = {"Main Street", "Maple Street", "Oak Street", "Willow Street", "Sycamore Street", "Cedar Street", "Birch Street", "Hickory Street" } 

    Private streetDescriptions() As String = {
    "Main Street is a busy street with numerous shops and businesses.",
    "Maple Street is a residential area with friendly neighbours.",
    "Oak Street is home to many historic buildings.", 
    "Willow Street is known for its vibrant nightlife.",
    "Sycamore Street is a beautiful, tree-lined street.",
    "Cedar Street is a peaceful street with an abundance of nature.", 
    "Birch Street is a quaint street with charming cobblestone paths.", 
    "Hickory Street is a lively street with many interesting shops." }

    Sub Main()
        Dim streetIndex As Integer = 0
        Dim totalStreets As Integer = streetNames.Length

        For streetIndex = 0 To totalStreets - 1
            Console.WriteLine("Reclaiming {0}", streetNames(streetIndex))
            Console.WriteLine(streetDescriptions(streetIndex))
            Console.WriteLine()
        Next
    End Sub
End Module